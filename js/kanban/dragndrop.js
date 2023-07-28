function drag(e) {
    e.dataTransfer.setData("text", e.target.id);
  }
  
  function allowDrop(e) {
    e.preventDefault();
  }
  
  function drop(e) {
    e.preventDefault();
    var data = e.dataTransfer.getData("text");
    e.currentTarget.appendChild(document.getElementById(data));
  }
