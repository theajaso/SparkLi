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
    <div class="box1" style="background-color: #FFFBDA;">Why do you think is a golden <br> wedding anniversary <br>celebrated?
      <div class="stt_btn" id="btn6" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans6','btn6')"></div> 
    </div>
    <div class="number1" style="background-color: #FFFBDA;">6</div>
    <input type="text" class="answers1" contenteditable="true" id="ans6" placeholder="Enter Answer Here...">
  </div>

  <div class="box-container1">
    <div class="box1" style="background-color: #FFF2E1;">What should you do when <br>  you are invited?
      <div class="stt_btn" id="btn7" style="background-image: url('{% static 'images/microphone.png' %}');" 
      onclick="startSpeechToText('ans7','btn7' )"></div>
    </div>
    <div class="number1" style="background-color: #FFF2E1;">7</div>
    
    <input type="text" class="answers1" contenteditable="true" id="ans7" placeholder="Enter Answer Here...">
  </div>

  <div class="button-container">
    <a href="{% url 'summary_4' %}"  onclick="saveAnswersPart3()" class="button5">Next</a>
  </div>
</div>
</body>
</html>
