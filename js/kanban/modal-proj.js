document.addEventListener('DOMContentLoaded', function() {
  var modalkanban = document.getElementById("myModal-kanban");
  var buttonkanban = document.getElementById("myButton-kanban");
  var spankanban = document.getElementsByClassName("close-kanban")[0];

  buttonkanban.onclick = function() {
    modalkanban.style.display = "block";
  };

  spankanban.onclick = function() {
    modalkanban.style.display = "none";
  };

  window.onclick = function(event) {
    if (event.target == modalkanban) {
      modalkanban.style.display = "none";
    }
  };
});
