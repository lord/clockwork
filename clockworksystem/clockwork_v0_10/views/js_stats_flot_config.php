
var options = {
	xaxis: {
		mode: "time",
		timeformat: "%b %d %y",
		minTickSize: [1, "day"]
	},

	series: {
		lines: {
			show: 1
		},
		points: {
			show: 1,
			radius: 3,
			symbol: "circle"
		}
	},
	
	grid: { hoverable: true, clickable: true},

	colors: ["#ff0000"]
};
