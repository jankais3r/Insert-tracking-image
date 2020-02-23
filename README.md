## Background
I was recently helping a friend to track down a scammer that stole money from them. I wanted to get the scammer's IP address that could be provided to the police, and I thought that sending them an email with embedded tracking image would be the easiest way to get it. I was surprised to find out that there is no native support for embedding remote images in Outlook - every attempt resulted in the image being included in the email itself. That would not work for our purpose, obviously, as we needed the scammer's email client to download the picture from our server, which would in turn log their IP address to a log file. This guide and a collection of scripts will allow you to setup a similar targetted tracking operation. This is not a rocket science, and you won't get any more information about your target than any and every newsletter collects about you. Still, I encourage you to use this for tracking bad people only.

## Requirements
1. Server with a [LAMP stack](https://en.wikipedia.org/wiki/LAMP_(software_bundle)) for hosting the image. (I use [DigitalOcean](https://www.digitalocean.com) for my server needs. They are great.)
2. Microsoft Outlook for sending the email

## Server setup
1. Prepare the image you want to embed in the tracking email, and update rows 2 and 4 in `image.php` to contain the correct filename
2. Upload your image file, `image.php`, and `index.php` to `/var/www/html/` folder on your server
3. Visit `http://your-servers-ip-address/image.php?img=contract_termination.png` in your browser and verify that an entry was created in `http://your-servers-ip-address/log.txt`

## Embedding the remote image in Outlook for Mac
1. Create a new email message, and put `xxx` in place where you want to put your tracking image
![Mac step 1](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/mac_1.png)
2. Go File > Save As Template…
3. Open the `.emltpl` file in a text editor and search for `xxx`. The file will have two copies of your text. The first one is a plaintext version of the email (used e.g. on Apple Watch), the second one is an HTML version that we want to edit to contain our image.
![Mac step 2](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/mac_2.png)
4. Replace `xxx` with `<img src="http://your-servers-ip-address/image.php?img=contract_termination.png">` and save the file
![Mac step 3](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/mac_3.png)
5. Open the `.emltpl` file in Outlook and send the email
![Mac step 4](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/mac_4.png)

## Embedding the remote image in Outlook for Windows
1. Create a new email message, and put `xxx` in place where you want to put your tracking image
![Windows step 1](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/win_1.png)
2. Go File > Save As > Outlook Template (\*.oft)
3. Press Alt + F11 to open the Visual Basic interface
4. Go Insert > Module
5. Paste the content of `vb.txt` (don't forget to change the path to your `oft` file on row 3)
![Windows step 2](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/win_2.png)
6. Run the script by pressing the green play icon
7. You'll get a dialog window with an input box. Paste the following code into the box and press OK:
`<img src="http://your-servers-ip-address/image.php?img=contract_termination.png">`
![Windows step 3](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/win_3.png)
8. You'll get a new window containing your email with the tracking image embedded. Just send it.
![Windows step 4](https://github.com/jankais3r/Insert-tracking-image/blob/master/images/win_4.png)
