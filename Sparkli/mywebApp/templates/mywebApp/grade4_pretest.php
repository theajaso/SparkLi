{% load static %}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 4 - PreTest</title>
  <link rel="stylesheet" href="{% static 'css/grade4.css' %}">
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">

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
<header class="header">
  <a href="{% url 'summary_3' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
  <div class="logo-container">
  <img src="{% static 'images/sparkli_logo.png' %}" alt="Logo" class="logo">
  </div>
  <div class="header-text">
  <p>
      <span style="color: red;">PRETEST</span> - Grade 4 LEVEL
    </p>
</header>
  
  <div style="font-family: 'Comic Sans'; font-size:x-large;" class="content4">

  <div class="mic" style="background-image: url('{% static 'images/microphone.png' %}');"></div>
    <p style="text-align: center;"><b>Prompt: </b> Have you ever tried inviting a friend to your party? Read this invitation letter. Find out what occasion it is.</p>
    <p style="font-weight: bolder;  text-align: center;">“An Invitation Letter”</p>

    <p style="text-align: right;">Zamboanguita, Negros Oriental <br> May 30, 2008 </p>
<div style=   "text-align: justify;">
    <p>Dear Betty,</p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Our family will celebrate our grandparent’s golden wedding anniversary at our ancestral home on Saturday, June 21, 2008. We shall have a party in their honor.</p>
    <p>A special activity for kids is the Children’s Hour at 3:00 o’clock P.M.</p>
    <p>Come, let’s have fun! Be one of our child guests.</p>
    <p style="text-align: right;">Sincerely, <br> Shiela</p>
</div>
  
  </div>

  <div class="button-container5">
  <a href="{% url 'grade4_questionnaires' %}" class="button5">Done</a>
  </div>
</body>
</html>
