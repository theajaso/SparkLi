// Wait for DOM content to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Function to display saved answers in the Summary page
    function displaySummaryAnswers() {
      var answersContainer1 = document.getElementById('ans1');
      var answersContainer2 = document.getElementById('ans2');
      var answersContainer3 = document.getElementById('ans3');
      var answersContainer4 = document.getElementById('ans4');
      var answersContainer5 = document.getElementById('ans5');
  
      // Retrieve and display answers for Part 1
      var storedAnswersPart1 = localStorage.getItem('answersPart1');
      if (storedAnswersPart1 && answersContainer1 && answersContainer2 && answersContainer3) {
        var answersPart1 = JSON.parse(storedAnswersPart1);
        answersContainer1.innerHTML = answersPart1.answ1;
        answersContainer2.innerHTML = answersPart1.answ2;
        answersContainer3.innerHTML = answersPart1.answ3;
      }
  
      // Retrieve and display answers for Part 2
      var storedAnswersPart2 = localStorage.getItem('answersPart2');
      if (storedAnswersPart2 && answersContainer4 && answersContainer5) {
        var answersPart2 = JSON.parse(storedAnswersPart2);
        answersContainer4.innerHTML = answersPart2.answ4;
        answersContainer5.innerHTML = answersPart2.answ5;
      }
    }
  
    // Call displaySummaryAnswers when the Summary page loads
    displaySummaryAnswers();
  });
  
  // Function to save answers for Part 1 to localStorage
  function saveAnswersPart1() {
    var answers = {
      answ1: document.getElementById('ans1').value,
      answ2: document.getElementById('ans2').value,
      answ3: document.getElementById('ans3').value
    };
    localStorage.setItem('answersPart1', JSON.stringify(answers));
  }
  
  // Function to save answers for Part 2 to localStorage
  function saveAnswersPart2() {
    var answers = {
      answ4: document.getElementById('ans4').value,
      answ5: document.getElementById('ans5').value,
    };
    localStorage.setItem('answersPart2', JSON.stringify(answers));
  }
  
  // Function to save a copy of the answers
  function saveCopy() {
    var storedAnswersPart1 = localStorage.getItem('answersPart1');
    var storedAnswersPart2 = localStorage.getItem('answersPart2');
  
    if (storedAnswersPart1 && storedAnswersPart2) {
      var combinedAnswers = {
        part1: JSON.parse(storedAnswersPart1),
        part2: JSON.parse(storedAnswersPart2)
      };
  
      var blob = new Blob([JSON.stringify(combinedAnswers)], { type: 'application/json' });
  
      // Create a temporary anchor element to trigger the download
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(blob);
      a.href = url;
      a.download = 'combined_answers.json';
      document.body.appendChild(a);
      a.click();
  
      // Clean up
      window.URL.revokeObjectURL(url);
    }
  }
  
  
  
  function startSpeechToText(inputId, btnId) {
    const inputField = document.getElementById(inputId);
    const micButton = document.getElementById(btnId); // Get the specific microphone button
  
    // Toggle the active class for the specific microphone button
    micButton.classList.toggle('active-mic');
  
    if ('webkitSpeechRecognition' in window || 'SpeechRecognition' in window) {
      const recognition = 'webkitSpeechRecognition' in window ? new webkitSpeechRecognition() : new SpeechRecognition();
  
      recognition.lang = 'en-US';
      recognition.continuous = false;
      recognition.interimResults = false;
  
      recognition.onresult = function(event) {
        const result = event.results[0][0].transcript;
        inputField.value = result; // Set the value property for input fields
      };
  
      recognition.onerror = function(event) {
        console.error('Speech recognition error:', event.error);
      };
  
      recognition.onend = function() {
        micButton.classList.remove('active-mic');
      };
  
      recognition.start();
    } else {
      console.error('Speech recognition not supported.');
    }
  }
  
  
  //------------------------------ To Analyze -------------------//
  function analyzeAnswers() {
    var answers = {
      "answ1": document.getElementById('ans1').textContent.trim(),
      "answ2": document.getElementById('ans2').textContent.trim(),
      "answ3": document.getElementById('ans3').textContent.trim(),
      "answ4": document.getElementById('ans4').textContent.trim(),
      "answ5": document.getElementById('ans5').textContent.trim(),
      "grade_level": document.getElementById('gradeLevel').value.trim()  
    };
  
    console.log('Sending answers:', answers);
  
    var csrftoken = getCookie('csrftoken');
  
    $.ajax({
      url: '/analyze_similarity/',
      type: 'POST',
      data: answers,
      dataType: 'json',
      headers: {
        'X-CSRFToken': csrftoken
      },
      success: function(response) {
        console.log('Received response:', response);
        displayResults(response);
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
      }
    });
  }
  function displayResults(results) {
    var resultContainer1 = document.getElementById('result-ans1');
    var resultContainer2 = document.getElementById('result-ans2');
    var resultContainer3 = document.getElementById('result-ans3');
    var resultContainer4 = document.getElementById('result-ans4');
    var resultContainer5 = document.getElementById('result-ans5');
    var totalScoreContainer = document.getElementById('total-scores');
    var categoryScoreContainer = document.getElementById('category-scores');
  
    resultContainer1.innerHTML = createResultHtml(results['results']['answ1']);
    resultContainer2.innerHTML = createResultHtml(results['results']['answ2']);
    resultContainer3.innerHTML = createResultHtml(results['results']['answ3']);
    resultContainer4.innerHTML = createResultHtml(results['results']['answ4']);
    resultContainer5.innerHTML = createResultHtml(results['results']['answ5']);
  
   
    var categoryScores = results['category_scores'];
    var totalCorrectScores = results['total_correct_answers'];

  
    if (categoryScores) {
      categoryScoreContainer.innerHTML = `
        <div class="category-scores">
          <p>Literal Score: ${categoryScores['literal'].score}% (${categoryScores['literal'].correct} out of ${categoryScores['literal'].total})</p>
          <p>Interpretative Score: ${categoryScores['interpretative'].score}% (${categoryScores['interpretative'].correct} out of ${categoryScores['interpretative'].total})</p>
          <p>Applied Score: ${categoryScores['applied'].score}% (${categoryScores['applied'].correct} out of ${categoryScores['applied'].total})</p>
          <hr>
        </div>
      `;
    } else {
      categoryScoreContainer.innerHTML = '';
    }
    if (totalCorrectScores !== undefined) {
      totalScoreContainer.innerHTML = `
        <div class="total-scores">
          <p>Total Scores: ${totalCorrectScores}</p>
          <hr>
        </div>
      `;
    } else {
      totalScoreContainer.innerHTML = '';
    }
  }
  function createResultHtml(resultData) {
    var resultDiv = document.createElement('div');
    resultDiv.classList.add('result-item');
  
    var correctness = resultData.result === 'Correct' ? 'green' : 'red';
    resultDiv.innerHTML = `
      <p><strong>Expected Answer:</strong> ${resultData.expected_answer}</p>
      <p style="color: ${correctness};"><strong>Result:</strong> ${resultData.result}</p>
      <hr>
    `;
    return resultDiv.outerHTML;
  }
  
  
  document.getElementById("analyzeBtn").addEventListener("click", function() {
    this.disabled = true;  // Disable the button to prevent multiple clicks
    analyzeAnswers();
  });
  
  
  function getCookie(name) {
    var cookieValue = null;
    if (document.cookie && document.cookie !== '') {
      var cookies = document.cookie.split(';');
      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.substring(0, name.length + 1) === (name + '=')) {
          cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
          break;
        }
      }
    }
    return cookieValue;
  }
  