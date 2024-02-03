<html>
  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="newchatbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



    <title>AngeBot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.0/dist/js.cookie.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
    
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
      integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e"
      crossorigin="anonymous"
    />
    <script>
      $(document).ready(function () {
        // Send the form on enter keypress and avoid if shift is pressed
        $("#prompt").keypress(function (event) {
          if (event.keyCode === 13 && !event.shiftKey) {
            event.preventDefault();
            $("form").submit();
          }
        });

        
        
        $("form").on("submit", function (event) {
          event.preventDefault();
          // get the CSRF token from the cookie
          var csrftoken = Cookies.get("csrftoken");

          // set the CSRF token in the AJAX headers
          $.ajaxSetup({
            headers: { "X-CSRFToken": csrftoken },
          });
          // Get the prompt
          var prompt = $("#prompt").val();
          var dateTime = new Date();
          var time = dateTime.toLocaleTimeString();
          // Add the prompt to the response div
          $("#response").append(
            '<p id="GFG1">(' +
              time +
              ') <i class="bi bi-person"></i>: ' +
              prompt +
              "</p>"
          );
          $("#response #GFG1").css({
            color: "#32ff7e",
            width: "90%",
            float: "left",
          });
          // Clear the prompt
          $("#prompt").val("");
          $.ajax({
            url: "/",
            type: "POST",
            data: { prompt: prompt },
            dataType: "json",
            success: function (data) {
              $("#response").append(
                '<p id="GFG2">(' +
                  time +
                  ') <i class="bi bi-robot"></i>: ' +
                  data.response +
                  "</p>"
              );
              $("#response #GFG2").css({
                color: "#fff200",
                width: "90%",
                float: "right",
              });
            },
          });
        });
      });
    </script>
  </head>

  <body>

    <div class="xxx">


      <div class="header"><h1>AngeBot</h1>
        
        <div id="cikis-container" onclick="goBack()">
          <div id="cikis">🠔</div>
          </div>
      
      </div>
      

      
  

      <div class="body">
        <h6>Me:</h6>

        <div class="" id="response"></div>

      </div>





      <div class="footer">
    
        <form method="post" action="">


   <label for="prompt" class="form-label"><strong> </strong></label>

     <div class="footer-input">
    <input type="text" class="form-control" id="prompt" name="prompt" rows="3" placeholder="Type here...">
    <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i></button>
    </div>
  


        </form>
 
 
       </div>


    </div>
  
    <script>  
      function goBack() {
      window.history.back();
   }
   </script>

  </body>
  
</html>
