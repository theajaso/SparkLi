{% load static %}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Summary - Answers</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{% static 'js/grade4_script.js' %}"></script>
  <style>
    @font-face {
      font-family: 'Comic Sans';
      src: url({% static 'fonts/COMICSANS.TTF' %}) format('truetype');
    }

    @font-face {
      font-family: 'Blueberry';
      src: url({% static 'fonts/Blueberry.ttf' %}) format('truetype');
    }
  </style>
</head>

<body class="background2">
  <header class="header1">
    <a href="{% url 'grade3_questionaires2' %}" class="circle-button"
      style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    <img src="{% static 'images/sparkli_Logo.png' %}" alt="Logo" class="logo">
  </header>

  <div class="content3">
    <h1 style="font-family: Comic Sans; font-size: 40px">Summary - Answers</h1>
    <div class="summary" style="text-align: left; font-family: Comic Sans;">

      <div style="font-size: larger; font-weight: bold;">Question 1: What will the family celebrate?</div>
      <div  style="font-size: large; margin-bottom: 20px" id="ans1"></div>
      <div id="result-ans1" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 2: When will they celebrate the Golden Wedding Anniversary?</div>
      <div  style="font-size: large; margin-bottom: 20px" id="ans2"></div>
      <div id="result-ans2" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 3: What activity in the anniversary is Betty invited to come?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans3"></div>
      <div id="result-ans3" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 4: Who wrote the letter?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans4"></div>
      <div id="result-ans4" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 5: What is another word for guests?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans5"></div>
      <div id="result-ans5" class="results-container"></div>


      <div style="font-size: larger; font-weight: bold;">Question 6: Why do you think is a golden wedding anniversary celebrated?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans6"></div>
      <div id="result-ans6" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 7: What should you do when you are invited?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans7"></div>
      <div id="result-ans7" class="results-container"></div>
      
      <div id="category-scores"></div>
      <div id="total-scores"></div>



      <input type="hidden" id="gradeLevel" name="grade_level" value="grade_4">


    </div>


    <div class="button-container1">
      <button style="font-family: Comic Sans;" class="analyzebtn" onclick="analyzeAnswers()">Analyze</button>
      <a href="{% url 'grade2_posttest' %}" class="donebtn">Done</a>

    </div>
  
  </div>
</body>

</html>