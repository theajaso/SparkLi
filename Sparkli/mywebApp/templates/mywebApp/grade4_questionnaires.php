{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 4 - Questionnaires (Part 1)</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade4.css' %}">
  <script src="{% static 'js/grade4_script.js' %}"></script>
  </head>

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
<body class="background7">
  <header class="header1">
    <a href="{% url 'grade3_pretest' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
    <div class="logo-container">
      <img src="{% static 'images/sparkli_logo.png' %}" alt="Logo" class="logo">
    </div>
    <div class="header-text" style="font-family:BryndanWriteBook;">
      <p>
        QUESTIONNAIRES
      </p>
    </div>
  </header>


  
  <div class="box-container">

    <div class="box-container">
      
      <div class="box" style="background-color: #FFFBDA;">What will the family <br> celebrate?
      <div class="stt_btn" id="btn1" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans1', 'btn1')"></div>
        </div>
    <div class="number" style="background-color: #FFFBDA;">1</div>
      <input type="text" class="answers" contenteditable="true" id="ans1" placeholder="Enter Answer Here...">
    </div>

    <div class="box-container">
      <div class="box" style="background-color: #FDE2E2;">When will they celebrate <br> the Golden Wedding <br>Anniversary?
    
      <div class="stt_btn" id="btn2" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans2', 'btn2')"></div>
      </div>
      <div class="number" style="background-color: #FDE2E2;">2</div>
      <input type="text" class="answers" contenteditable="true" id="ans2" placeholder="Enter Answer Here...">
    </div>

    <div class="box-container">
      <div class="box" style="background-color: #DEE4F4;">What activity in the  <br>  anniversary is Betty <br> invited to come?
      <div class="stt_btn" id="btn3" style="background-image: url('{% static 'images/microphone.png' %}');" onclick="startSpeechToText('ans3','btn3')"></div> 
    </div>
      <div class="number" style="background-color: #DEE4F4;">3</div>
      <input type="text" class="answers" contenteditable="true" id="ans3" placeholder="Enter Answer Here...">

    </div>
    </div>
  <div class="button-container">
  <a href="{% url 'grade4_questionnaires2' %}" onclick="saveAnswersPart1()" class="button5">Next</a>
  </div>
</body>
</html>