$(document).ready(function() {
    google.charts.load('upcoming', { 'packages': ['map'] });
    google.charts.setOnLoadCallback(drawMap);

    function drawMap() {
        var data = google.visualization.arrayToDataTable(
            [
                ['Lat', 'Long', 'Name'],
                [-25.981884, 32.557248, 'Maputo'],
                [-24.480532, 33.561088, 'Gaza'],
                [-22.767511, 34.450511, 'Inhambane'],
                [-19.783651, 34.888177, 'Sofala']
            ]
        );

        var options = {
            showTooltip: true,
            zoomLevel: 8,
            showLine: true,
            showInfoWindow: true,
            mapType: 'normal'
        };

        var map = new google.visualization.Map(document.getElementById('map_div'));

        map.draw(data, options);
    };
});