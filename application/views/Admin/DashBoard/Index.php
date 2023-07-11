
<style>
  div{
    margin : 10%;
  }
</style>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div>
  <canvas id="barChart"  height="300" width="100" style="margin-left:20% ;  margin-right :20% "></canvas>

  <script>
    // Données du graphique
    var data = {
      labels: ['Activite en circuit', 'Activite de resistance', 'Activite de renforcement'],
      datasets: [{
        label: 'Ventes',
        data: [12, 19, 3],
        backgroundColor: '#36a2eb'
      }]
    };

    // Options du graphique
    var options = {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        title: {
          display: true,
          text: 'Type Objectif plus'
        },
        legend: {
          display: false
        }
      }
    };
    
    // Création du graphique en barres
    var barChart = new Chart(document.getElementById('barChart'), {
      type: 'bar',
      data: data,
      options: options 
    });
  </script>
</div>
<div>

<canvas id="lineChart" width="400" height="400" style="margin-left:20% ;  margin-right :20% "></canvas>

<script>
  // Données du graphique
  var data = {
    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
    datasets: [{
      label: 'Données 1',
      data: [10, 15, 30, 20, 40, 35],
      backgroundColor: 'rgba(75, 192, 192, 0.2)', // Couleur de fond de la zone sous la courbe
      borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la courbe
      borderWidth: 1,
      tension: 0.4 // Tension de la courbe (0 = ligne droite, 1 = très courbé)
    }, {
      label: 'Données 2',
      data: [5, 15, 25, 25, 35, 35],
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgba(255, 99, 132, 1)',
      borderWidth: 1,
      tension: 0.4
    }]
  };

  // Options du graphique
  var options = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      y: {
        beginAtZero: true
      }
    }
  };

  // Création du graphique en courbe
  var lineChart = new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: data,
    options: options
  });
</script>

</div>