var url = 'http://localhost:8081/routes/api.php';

function ViewMessages() {
  var html = './resources/views/messages.php';
  var container;
  var chart;

  this.open = open;
  function open(selector) {
    $.get(html, function (data) {
      container = $(data);
      $(selector).append(container);

      $(container).find('.Go').click(function() {
        get()
      })

      createChart()
      get()
    })
  }

  this.get = get;
  function get() {

      var fromDate = $(container).find('#DateFrom').val();
      var toDate = $(container).find('#DateTo').val();
      var classType = $(container).find('#Class').val();

      var params = 'service=messages';
      params += '&method=getCumulative';
      params += '&classType=' + classType;
      params += '&fromDate=' + fromDate;
      params += '&toDate=' + toDate;

      $.ajax({
        url: url, 
        data: params, 
        dataType: 'json',
        success: loadChart,
        error: (xhr, string, errorThrown) => {console.log("error", xhr, string, errorThrown)}
      });

  }

  this.loadChart = loadChart;
  function loadChart(response) {
    chart.setData(cumulate(response));
  }

  this.cumulate = cumulate;
  function cumulate(dataIn) {
    var previous = 0;
    var dataOut = [];
    $.each( dataIn, function(index, row) {
      var item = {MessageDate: row['MessageDate'], DayCount: parseInt(row['DayCount']) + previous}
      dataOut.push(item);
      previous = parseInt(row['DayCount']) + previous;
    })

    return dataOut;
  }
  this.createChart = createChart;
  function createChart () {
    chart = new Morris.Line({
      element: 'thechart',
      data: [],
      xkey: 'MessageDate',
      ykeys: ['DayCount'],
      labels: ['DayCount'],
      resize: true,
      pointSize: 1
    });
  }
};
