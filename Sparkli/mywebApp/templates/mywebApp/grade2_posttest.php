{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 2- Post Test</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade2.css' %}">
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
<body class = "background8">
<header class = "header">
  <a href="{% url 'grade2_posttest' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
  <div class="logo-container">
  <img src="{% static 'images/sparkli_logo.png' %}" alt="Logo" class="logo">
  </div>
  <div class="header-text" >
  <p>
      <span style="color: red;">POST TEST</span> - Grade 2 LEVEL
    </p>
</header>
  
<div class="content2">
  <div class="mic" style="background-image: url('{% static 'images/microphone.png' %}');"></div>
    <p><b>Prompt:</b> Do you know what plants need in order to grow? Find out from the selection below.</p>
        <br>
        <strong>"Air and Sunlight"</strong>
        <br>
        <br>
    <p>&nbsp;&nbsp; Miss Cruz asked her Science class, “What do plants need in order to live and grow?” John answered, 
        “Air and Sunlight,” “Good answer,” said Miss Cruz. “Green plants need sunlight to make their food. 
        They also need water and air.”
    </p>
    </div>

  <div class="button-container">
  <a href="{% url 'grade2_questionnaires' %}" class="button6">Done</a>
  </div>
</body>
</html>