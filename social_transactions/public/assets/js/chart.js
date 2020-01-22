$(document).ready(function() {
    load_chart($('.grafo'));
});
function load_data() {
	return [
                ['Bananos', 8],
                ['Kiwi', 2],
                ['Sandía', 3],
                ['Naranjas', 6],
                ['Manzanas', 4],
                ['Peras', 3],
                ['Mamones', 15],
                ['Mangos', 3],
                ['Uvas', 20]
	]
}
function load_chart(selector) {
    selector.highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45
            }
        },
          title: {
            text: 'Frutas comidas por semana'
        },
        plotOptions: {
            pie: {
                innerSize: 100,
                depth: 45
            }
        },
        series: [{
            name: 'Delivered amount',
            data: load_data()
        }]
    });
}
