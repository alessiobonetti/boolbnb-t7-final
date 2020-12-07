/* Statistiche Messaggi */
let myChartMex = document.getElementById('myChartMex').getContext('2d');
let massPopChart = new Chart(myChartMex, {
  type:'bar',
  data:{
    labels:['Appartemento  1', 'Appartemento  2', 'Appartemento  3', 'Appartemento  4', 'Appartemento  5', 'Appartemento  6', 'Appartemento  7', 'Appartemento  8', 'Appartemento  9', 'Appartemento 10', 'Appartemento 11', 'Appartemento 12'],
    datasets:[{
      label:'Messaggi',
      data:[8, 46, 55, 43, 51, 71, 87, 103, 97, 73, 42, 59],
      backgroundColor:'#E40066',
      borderWidth:1,
      borderColor:'#777',
      hoverBorderWidth:1,
      hoverBorderColor:'#000'
    }],

  },
  options:{
    title:{
      display:true,
      text:'I Messaggi dei tuoi Appartementi',
      fontSize:25
    },
    legend:{
      display:true,
      position:'right',
      labels:{
        fontColor:'rgb(255, 99, 132)'
      }
    },
    layout:{
      padding:{
        left:50,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});


/* Statistiche Visualizzazioni */
let myChartView = document.getElementById('myChartView').getContext('2d');
let massPopChartView = new Chart(myChartView, {
  type:'bar', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
  data:{
    labels:['data', 'data', 'data', 'data'],
    datasets:[{
      label:'Visualizzazioni',
        data:[22, 41, 5, 59, 81, 78, 97, 153],
        backgroundColor: '#03CEA4',
        borderWidth:1,
        borderColor:'#777',
        hoverBorderWidth:1,
        hoverBorderColor:'#000'
        }]
  },
  options:{
    title:{
      display:true,
      text:'Le Visualizzazioni dei tuoi Appartementi',
      fontSize:25
    },
    legend:{
      display:true,
      position:'right',
      labels:{
        fontColor:'rgb(255, 99, 132)'
      }
    },
    layout:{
      padding:{
        left:50,
        right:0,
        bottom:0,
        top:0
      }
    },
    tooltips:{
      enabled:true
    }
  }
});