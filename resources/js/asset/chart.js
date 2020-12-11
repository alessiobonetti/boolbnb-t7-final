/* Statistiche Messaggi */
let myChartMex = document.getElementById('myChartMex').getContext('2d');
let massPopChart = new Chart(myChartMex, {
  type:'bar',
  data:{
    labels:['Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data'],
    datasets:[{
      label:'Messaggi',
      data:[17, 23, 31, 51, 35, 45, 67, 42, 78],
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
    labels:['Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data', 'Data'],
    datasets:[{
      label:'Visualizzazioni',
        data:[59, 78, 87, 102, 89, 54, 92, 61, 108],
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