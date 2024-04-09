{% load static %}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page 14</title>
  <link rel="stylesheet" href="{% static 'css/styles.css' %}">
</head>
<style>
        @font-face {
            font-family: 'Comic Sans';
            src: url({% static 'fonts/COMICSANS.TTF' %}) format('truetype');
        }
    </style>
    <style>
        @font-face {
            font-family: 'Blueberry';
            src: url({% static 'fonts/Blueberry .ttf' %}) format('truetype');
        }
    </style>

<body class="background2">
  <header class="header1">
  <button class="circle-button" style="background-image: url('{% static 'images/back_button.png' %}');"></button>
    <img src="{% static 'images/sparkli_Logo.png' %}" alt="Logo" class="logo">
  </header>
  
  <div class="content1">
    <h1 style="font-family: Comic Sans" >READING COMPREHENSION RESULTS...</h1>
    <div class="feedbackbox">
      <p style="font-family: Comic Sans; font-size: x-large"  >Feedback here...</p>
      </div>
  </div>

  <div class="button-container1">
  <button style="font-family: Comic Sans" class="button1">Mind Bloom Games!</button>
  <div class="mindbloom" style="background-image: url('{% static 'images/mindbloom.png' %}');"></div>
  <a style="font-family: Comic Sans" href="grade3_pretest.php" class="button2">Proceed to Home</a>
</div>

</body>
</html>
