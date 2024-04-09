{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 3 - Questionnaires</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade3.css' %}">

  <script src="{% static 'js/grade3_script.js' %}"></script>
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
<body class="background3">
<header class="header1">
    <a href="{% url 'grade3_questionaires' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    </div>
</header>

<div class="box-container1">
  <div class="box-container1">
    <div class="box1" style="background-color: #FFF2E1;">Why will they present <br> folksongs and dances?
      <div class="stt_btn" id="btn4" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans4','btn4')"></div> 
    </div>
    <div class="number1" style="background-color: #FFF2E1;">4</div>
    <input type="text" class="answers1" contenteditable="true" id="ans4" placeholder="Enter Answer Here...">
  </div>

  <div class="box-container1">
    <div class="box1" style="background-color: #E3F0FB;">What other Filipino customs <br> and traditions do you practice?
      <div class="stt_btn" id="btn5" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans5','btn5' )"></div>
    </div>
    <div class="number1" style="background-color: #E3F0FB;">5</div>
    <input type="text" class="answers1" contenteditable="true" id="ans5" placeholder="Enter Answer Here...">
  </div>

  <div class="button-container">
    <a href="{% url 'summary_3' %}"  onclick="saveAnswersPart2()" style="font-family: 'Comic Sans'; font-size: large;" class="button">Next</a>
  </div>
</div>
</body>
</html>
