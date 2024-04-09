{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grade 3 - Pre Test</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
  <link rel="stylesheet" href="{% static 'css/grade3.css' %}">

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
<body class = "background3">
<header class="header">
  <a href="{% url 'home' %}" class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></a>
  <div class="logo-container">
  <img src="{% static 'images/sparkli_logo.png' %}" alt="Logo" class="logo">
  </div>
  <div class="header-text">
  <p>
      <span style="color: red;">PRETEST</span> - Grade 3 LEVEL
    </p>
</header>
  
  <div class="content2">
  <div class="mic" style="background-image: url('{% static 'images/microphone.png' %}');"></div>
    <p><b>Prompt:</b> How do you celebrate Foundation Day? Read the selection below.</p>
    <br>
    <strong>"Deal"</strong>
    <br>
    <br>
    <p>
      “Our Foundation Day will be on September 30,” said Miss Cruz, “What are we going to present?”
      “I suggest that we render some folksongs and folk dances,” answered Perla.
      “Good. These will remind us of our Filipino culture,” added Ruben.
      “Let’s start our practice early. That’s a deal,” insisted Susan.
    </p>
  </div>

  <div class="button-container">
  <a href="{% url 'grade3_questionaires' %}" style="font-family: 'Comic Sans'; font-size: large;" class="button">Done</a>
  </div>
 
</body>
</html>
