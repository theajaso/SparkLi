{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 3 - Questionnaires</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade2.css' %}">

  <script src="{% static 'js/grade2_script.js' %}"></script>
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
<body class="background8">
<header class="header1">
    <a href="{% url 'grade2_questionnaires' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    </div>
</header>

<div class="box-container1">
  <div class="box-container1">
    <div class="box1" style="background-color: #FFF2E1;">Why do green plants<br>need sunlight?
      <div class="stt_btn" id="btn4" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans4','btn4')"></div> 
    </div>
    <div class="number1" style="background-color: #FFF2E1;">4</div>
    <input type="text" class="answers1" contenteditable="true" id="ans4" placeholder="Enter Answer Here...">
  </div>

  <div class="box-container1">
    <div class="box1" style="background-color: #E3F0FB;">What is likely to happen<br> with green plants if there<br> is no sunlight?
      <div class="stt_btn" id="btn5" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans5','btn5' )"></div>
    </div>
    <div class="number1" style="background-color: #E3F0FB;">5</div>
    <input type="text" class="answers1" contenteditable="true" id="ans5" placeholder="Enter Answer Here...">
  </div>

  <div class="button-container">
    <a href="{% url 'summary_2' %}"  onclick="saveAnswersPart2()" class="button7">Next</a>
  </div>
</div>
</body>
</html>
