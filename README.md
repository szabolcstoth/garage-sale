# Garage Sale

The aim of this simple project is to provide a solution which can be used to host your own garage sale.

## Getting started

Before you copy the contents of `public` folder, you need to set your own values in the `config.php` and prepare all your items in the `items` folder.

### config.php

You can configure the basics via this configuration file, like:

* `title`,
* `owner`,
* `contact_url`

### items

This is the most important folder, you need to put all your item related files (`details.json` and the images) here in the following structure.

```
items
├───name-of-the-item-you-would-like-to-sell-1
│   │   details.json
│   │
│   └───images
│           name-of-the-item-you-would-like-to-sell-1-001.jpg
│           name-of-the-item-you-would-like-to-sell-1-002.jpg
└───name-of-the-item-you-would-like-to-sell-2
    │   details.json
    │
    └───images
            name-of-the-item-you-would-like-to-sell-2-001.jpg
```

#### details.json

This file contains the details about the item you would like to sell in `json` format.

```json
{
    "name": "Name Of The Item You Would Like To Sell #1",
    "price": 10,
    "currency": "USD",
    "description": "Short description you might want to share about the item.",
    "tags": ["good condition", "priceless"]
}
```

The value of the `tags` key can be an empty list.

#### images

The `images` folder is optional and you can give any name to your images. Please take a note that the first image (in ABC order) will be used as the cover image.

## Start your own garage sale

You need to upload the content of the `public` folder to your hosting service which supports PHP. That's it!

## Used technologies

The project is built upon the following technologies:

* Bootstrap: it is used to quickly create a nice layout for the page.
* PHP: it is used to collect the items from the `items` folder and parse their details from `details.json`. Based on this information it will generate the HTML code for the cards used to show the items.

Other tools which are used in this project:

* [Masonry](https://masonry.desandro.com/): it is not included by default in Bootstrap 5.
* [GLightbox](https://biati-digital.github.io/glightbox/): separate lightbox gallery for every item.

## License

Please see the [license file](LICENSE) for more information.
