<!DOCTYPE html>
<html>
<head>
  <title>Confirmation de suppression</title>
  <style>
    body {
        font-family: "Lato", Arial, sans-serif;
    color: #8d448b;
    font-size: 16px;
    background-color:white;
    }

    .dialog-overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color:#f8f9fd;
      display: flex;
      align-items: center;
      justify-content: center;
      z-index: 9999;
    }
    
    .dialog-box {
      background-color: #fff;
      border-radius: 4px;
      padding: 20px;
      width: 500px;
      height: 230px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
    
    .dialog-box h2 {
      padding-bottom:20px;
      margin-top: 0;
    }
    
    .dialog-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: center;
    }
    
    .dialog-buttons button ,.dialog-buttons a{
      margin: 0 5px;
      padding: 8px 16px;
      font-size: 14px;
      border-radius: 4px;
      cursor: pointer;
      border: none;
      background-color: #8d448b;
      color: #fff;
    }

    .dialog-buttons button:hover, .dialog-buttons a:hover {
      background-color: #6923eb;
    }
  </style>
</head>
<body>
  <div class="dialog-overlay">
    <div class="dialog-box">
      <h2>Etes-vous sur de vouloir supprimer ?</h2>
      <div class="dialog-buttons">
        <a href="<?php echo base_url("ControllerAdmin/supprimerSakafo?idSakafo=".$idSakafo)?>"> Oui </a>
        <a href="<?php echo base_url("ControllerAdmin/annulerSakafo") ?>"> Non </a>
      </div>
    </div>
  </div>

  <script>
    function supprimer() {
      // Code pour la suppression
      alert("Suppression effectuée !");
    }

    function annuler() {
      // Code pour annuler la suppression
      alert("Suppression annulée !");
    }
  </script>
</body>
</html>
