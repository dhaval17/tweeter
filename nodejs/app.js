var Twitter = require('twitter');
var CronJob = require('cron').CronJob;
var fortune = require('fortune-teller');
 
var client = new Twitter({
  consumer_key: '',
  consumer_secret: '',
  access_token_key: '',
  access_token_secret: ''
});
 
new CronJob('* * * * * *', function() {
    //console.log('You will see this message every second');
    var tweet = fortune.fortune();
	client.post('statuses/update', {
		status: tweet
	}, function(error, tweet, response) {
		if (!error) {
			console.log(tweet);
		}
	});
}, null, true, 'America/Los_Angeles');