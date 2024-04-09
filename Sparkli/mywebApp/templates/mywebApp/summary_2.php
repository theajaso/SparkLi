{% load static %}
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Summary - Answers</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{% static 'js/grade2_script.js' %}"></script>
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
    <a href="{% url 'grade2_questionnaires2' %}" class="circle-button"
      style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    <img src="{% static 'images/sparkli_Logo.png' %}" alt="Logo" class="logo">
  </header>

  <div class="content3">
    <h1 style="font-family: 'Comic Sans'; font-size: 40px">Summary - Answers</h1>
    <div class="summary">

      <div style="font-size: larger; font-weight: bold;">Question 1: What do plants need in order to live and grow? </div>
      <div style="font-size: large; margin-bottom: 20px" id="ans1"></div>
      <div id="result-ans1" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 2: What did Miss Cruz say about John’s answer?</div>
      <div  style="font-size: large; margin-bottom: 20px" id="ans2"></div>
      <div id="result-ans2" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 3: What else do plants need aside from air and sunlight?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans3"></div>
      <div id="result-ans3" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 4: Why do green plants need sunlight?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans4"></div>
      <div id="result-ans4" class="results-container"></div>

      <div style="font-size: larger; font-weight: bold;">Question 5: What is likely to happen 
      with green plants if there is no sunlight?</div>
      <div style="font-size: large; margin-bottom: 20px" id="ans5"></div>
      <div id="result-ans5" class="results-container"></div>

      <input type="hidden" id="gradeLevel" name="grade_level" value="grade_2">
      <div id="category-scores"></div>


    </div>


    <div class="button-container1">
      <button  class="analyzebtn" onclick="analyzeAnswers('grade2')">Analyze</button>
      <a href="{% url 'grade4_pretest' %}"  class="donebtn">Done</a>

    </div>
  
 

    <!-- Container to display results -->
  </div>
</body>

</html>