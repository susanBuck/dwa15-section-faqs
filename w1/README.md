## Domains / Subdomains 

**July 3 Update: Right now these instructions are specific to Pagoda; we'll update with details relevant to the new live server provider, once we decide what that server is. **

Register a domain name via a service like [Namecheap](http://namecheap.com). This should cost you about $10, give or take, depending on the TLD (Top Level Domain) extension you use. For example, a `.me` domain can often be cheaper than a `.com` domain.

If you already have a domain, you can use that too.

In Pagoda, within your admin settings for your hello-world application, find the **DNS/SSL** tab. 

Within this section, find the option to **+ Add New Alias** under *DNS Aliases*.

For this course, you can use the same domain and have all the different apps you'll build as subdomains of this domain, for example:

+ `hello-world.yourdomain.com`
+ `p1.yourdomain.com`
+ `p2.yourdomain.com`
+ `p3.yourdomain.com`
+ `p4.yourdomain.com`

Given this, enter `hello-world.yourdomain.com` for your first app.

After you click Save (bottom right), Pagoda will propagate a IP address which you should copy:

<img src='http://making-the-internet.s3.amazonaws.com/vc-pagoda-domain-alias@2x.png' class='' style='max-width:1008px; width:75%' alt='Create a domain alias in Pagoda'>

Log into Namecheap (or your domain provider) and find the DNS settings for your domain. 

Create a new A (Address) Record which points to the IP address Pagoda gave you:

<img src='http://making-the-internet.s3.amazonaws.com/vc-subdomain-settings-in-namecheap@2x.png' class='DNS Settings in Namecheap' style='max-width:1268px; width:75%' alt=''>

Wait a few minutes and then test out your new subdomain...Does it point to your app?

If not, here's a few things to try:

1. Clear your browser cache
2. Do a [DNS Cache Flush](http://docs.cpanel.net/twiki/bin/view/AllDocumentation/ClearingBrowserCache).

Try again. Still not loading?

2. Try accessing your URL via [this proxy](http://www.megaproxy.com/freesurf/). Does it load there? If it loads there, it just means your computer is still caching old settings. 
3. Are your nameserver changes showing up in a [LeafDNS](http://leafdns.com/) report? 


### References:

* [Pagoda Box Help: Using a Custom Domain](http://help.pagodabox.com/customer/portal/articles/175471-using-a-custom-domain)


## Virtual hosts

[Notes: Virtual Hosts](https://github.com/susanBuck/notes/blob/master/07_Version_Control/999_Virtual_Hosts.md)

## Set up a Git GUI

[Notes: Git Apps](https://github.com/susanBuck/notes/blob/master/07_Version_Control/999_Git_Apps.md)
