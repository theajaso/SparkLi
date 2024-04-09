{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 4 - Questionnaires (Part 3)</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade4.css' %}">

  <script src="{% static 'js/grade4_script.js' %}"></script>
  <style>
    @font-face {
        font-family: 'Comic Sans';
        src: url({% static 'fonts/COMICSANS.TTF' %}) format('truetype');
    }
    @font-face {
        font-family: 'BryndanWriteBook';
        src: url({% static 'fonts/BryndanWriteBook.ttf' %}) format('truetype');
    }
  </style>
</head>
<body class="background7">
<header class="header1">
    <a href="{% url 'grade4_questionnaires' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    </div>
</header>

<div class="box-container1">
  <div class="box-container1">
    <div class="box1" style="background-color: #BAC9EE;">Who wrote the letter?
      <div class="stt_btn" id="btn4" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans4','btn4')"></div> 
    </div>
    <div class="number1" style="background-color: #BAC9EE;">4</div>
    <input type="text" class="answers1" contenteditable="true" id="ans4" placeholder="Enter Answer Here...">
  </div>

  <div class="box-container1">
    <div class="box1" style="background-color: #E3F0FB;">What is another word <br> for guests?
      <div class="stt_btn" id="btn5" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans5','btn5' )"></div>
    </div>
    <div class="number1" style="background-color: #E3F0FB;">5</div>
    <input type="text" class="answers1" contenteditable="true" id="ans5" placeholder="Enter Answer Here...">
  </div>

  <div class="button-container">
    <a href="{% url 'grade4_questionnaires3' %}"  onclick="saveAnswersPart2()"class="button5">Next</a>
  </div>
</div>
</body>
</html>
