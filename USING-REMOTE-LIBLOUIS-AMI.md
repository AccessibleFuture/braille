# Using the Remote LibLouis Amazon Machine Image

MITH has created a machine image that can be used with Amazon's EC2 offering. The AMI identifier is `ami-a5c892cc`.

## Six Step Process

### Step 0: Create an Amazon EC2 account

You will need an account with [Amazon's Web Services](http://aws.amazon.com/). You can sign in with your Amazon account and then activate the EC2 service. Amazon may ask you for billing information such as a credit card. EC2 instances cost anywhere from a few cents per hour to several dollars per hour. If you are enabling EC2 services for the first time, you might qualify for the free tier for a year.

### Step 1: Go to the EC2 Management Console

You will need to navigate through Amazon's site to the [Amazon Web Services management console](https://console.aws.amazon.com/console/home). From there, select [the EC2 link](https://console.aws.amazon.com/ec2/v2/home).

### Step 2: Go to the AMIs Management View

One of the options on the left side of the page is ["AMIs"](https://console.aws.amazon.com/ec2/v2/home#Images:). Selecting this will bring up a view allowing you to search for publicly available machine images.

### Step 3: Search for the LibLouis AMI

In the AMI view, [you should search public images (left-most filter at the top) for an AMI matching `ami-a5c892cc`](https://console.aws.amazon.com/ec2/v2/home#Images:filter=all-images;platform=all-platforms;visibility=public-images;search=ami-a5c892cc).

### Step 4: Launch the Service

Select the `liblouis-service` AMI and then the "Launch" button. From here, you can select the instance type and other settings as you need. If you are trying out the service for the first time or you don't need to make thousands of requests per hour, you should be fine with the default micro instance.

Once you have changed any settings that you need to, select the "Review and Launch" button towards the bottom of the page. This should start up an instance and give you the IP address.

### Step 5: Use the Service

After launching the service, you can configure your WordPress site to use this service. The URL will be based on the IP address of the service as reported in Step 4. For example, if the IP address is 192.168.125.4, then the URL of the service is http://192.168.125.4/braille.json. See the documentation for the WordPress plugin for more information on configuring plugin to use the remote LibLouis service.

## Server organization

The server is running Ubuntu 12.04 LTS.

The server uses `nginx` to provide the world-facing web service. The version of `nginx` we use is installed in `/opt/nginx`, but the `nginx` application is linked to `/sbin/nginx` so that the standard initialization and control scripts work. The configuration is in `/opt/nginx/conf/` instead of `/etc/nginx/`.

The Sinatra service is installed in `/home/ubuntu/remote-liblouis`.