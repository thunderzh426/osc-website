# WP-SMS Wordpress Plugin
A complete wordpress plugin to send sms with a high capability.
Send SMS via WordPress, Subscribe SMS newsletter and Send SMS to Number(s), Subscribes and Wordpress Users.

You can add to wordpress, the ability of sending sms. you can make users, member of sms newsletter and send to them sms.
To every changement of position in wordpress, you can send a sms through this plugin.

The usage of this plugin is completely free. You have to just have an account from a service in the gateway listes that we support them. 
Don't worry , we have tried to add the best and the most gateways to plugin. 

Very easy Send SMS by PHP code:

1. `global $sms;`
2. `$sms->to = array('09000000000');`
3. `$sms->msg = "Hello World!";`
4. `$sms->SendSMS();`

# Features

* Send SMS to number(s), subscribers and wordpress users.
* Subscribe newsletter SMS.
* Widget for register user to sms subscribed.
* Support Wordpress Hooks.
* Support Wordpress Shortcode.
* Send activation code to subscribe for complete subscription.
* Notification SMS when published new post to subscribers.
* Notification SMS when the new release of WordPress.
* Notification SMS when registering a new User.
* Notification SMS when get new comment.
* Notification SMS when user logged into wordpress.
* Notification SMS when user registered to subscription form.
* Integrate with (Contact form 7, WooCommerce, Easy Digital Downloads)
* Create Category for newsletter.
* Import/Export Subscribers.

# Professional Package
In the Professional pack added many features, another useful gateway and is integrated with another plugins.

* Smshosting.it
* Twilio.com
* plivo.com
* clickatell.com
* bulksms.com
* infobip.com
* nexmo.com
* clockworksms.com
* cmtelecom.com
* viensms.com
* moceansms.com
* msg91.com
* yamamah.com
* magicdeal4u.com
* sendsms247.com
* smslive247.com
* isms.com.my
* ssdindia.com
* vsms.club
* livesms.eu
* cellsynt.net
* gateway.sa
* ra.sa
* mobily.ws
* sms4marketing.it
* smstrade.de
* dsms.in
* cpsms.dk
* bulksmshyderabad.co.in
* ozioma.net

* Integrate with BuddyPress
You can adding mobile number field to profile page, send SMS to user when mentioned in the post and sending SMS to user when posted a comment on the post.
* Integrate with WooCommerce.
You can adding mobile number field to checkout page, send sms to users or subscribers when added new product to woocommerce. send SMS to admin when submitted new order in woocommerce and send sms to customers when submit the order.
when one stock product is load, the plugin can send SMS to admin for notify and you can send sms to customers when the orders have been changed.
* Integrate with Gravity form.
Plugin can be send sms to user or admin after submit the form.
* Integrate with Quform.
Plugin can be send sms to user or admin after submit the form.
* Integrate with Easy Digital Downloads.
You can adding mobile number field to profile page. can be send sms to user or admin when submitted an order with EDD.
* Premium Support

# Translators
* English
* Persian
* Arabic (Thanks Hamad Al-Shammari, Gateway.sa)
* Portuguese (Thanks Matt Moxx)
* Spanish (Thanks Yordan Soares)
* German (Thanks Robert Skiba)
* Swedish (Thanks Kramfors)

# Installation
1. Upload `wp-sms` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To display Subscribe goto Themes -> Widgets, and adding `Subscribe to SMS` into your sidebar Or using this functions: `<?php wp_subscribes(); ?>` into theme.
or using this Shortcode `[subscribe]` in Posts pages or Widget.
4. Using this functions for send manual SMS:

* First: `global $sms;`
* `$sms->to = array('MobileNumber');`
* `$sms->msg = "YourMessage";`
* Send SMS: `$sms->SendSMS();`

# Actions
Run following action when send sms with this plugin.
```sh
wp_sms_send
```

Example: Send mail when send sms.
```sh
function send_mail_when_send_sms($message_info) {
	wp_mail('you@mail.com', 'Send SMS', $message_info);
}
add_action('wp_sms_send', 'send_mail_when_send_sms');
```

Run following action when subscribe a new user.
```sh
wp_sms_add_subscriber
```

Example: Send sms to user when register a new subscriber.
```sh
function send_sms_when_subscribe_new_user($name, $mobile) {
	global $sms;
	$sms->to = array($mobile);
	$sms->msg = "Hi {$name}, Thanks for subscribe.";
	$sms->SendSMS();
}
add_action('wp_sms_add_subscriber', 'send_sms_when_subscribe_new_user', 10, 2);
```

# Filters
You can use following filter for modify from number.
```sh
wp_sms_from
```

Example: Add 0 to the end sender number.
```sh
function wp_sms_modify_from($from) {
	$from = $from . ' 0';
	
	return $val;
}
add_filter('wp_sms_from', 'wp_sms_modify_from');
```

You can use following filter for modify receivers number.
```sh
wp_sms_to
```

Example: Add new number to get message.
```sh
function wp_sms_modify_receiver($numbers) {
	$numbers[] = '09xxxxxxxx';
	
	return $numbers;
}
add_filter('wp_sms_to', 'wp_sms_modify_receiver');
```

You can use following filter for modify text message.
```sh
wp_sms_msg
```

Example: Add signature to messages that are sent.
```sh
function wp_sms_modify_message($message) {
	$message = $message . ' /n Powerby: WP-SMS';
	
	return $message;
}
add_filter('wp_sms_msg', 'wp_sms_modify_message');
```

# Sources
* Wordpress plugin page: www.wordpress.org/plugins/wp-sms/
* Website plugin: www.wp-sms.ir
* Translator: www.wp-sms.ir/translators
* Buy Pro version: www.wp-sms.ir/purchases
* Donate: www.mostafa-soufi.ir/donate/