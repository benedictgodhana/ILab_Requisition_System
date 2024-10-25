<!doctype html>
<html lang="en">
<head>
    <title>Archer's Tours - Destinations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Other Stylesheets -->
    <link rel="stylesheet" href="{{ asset('Template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('mercury-travel-master/assets/css/main.css') }}">


    <style>
      /*--------------------------------------------------------------------------------

	# HTML Template 1.0 - Apr 30, 2018
	# ------------------------------------------------------------------------
	# Designed & coded by Awe7
	# Websites:  http://www.awe7.com -  Email: info@awe7.com

----------------------------------------------------------------------------------

	1. base
	2. button
	3. form-item
	4. button
	5. box_image
	6. box_image2
	7. box_image3
	8. box_search
	9. box_share
	10. general_breadcrumb
	11. expert
	12. form_item
	13. grid-css
	14. page_title
	15. socialicon
	16. socialicon
	17. swiper
	18. title
	19. widget_image
	20. general_widget_image
	21. general_widget_list
	22. widget_text
	23. footer
	24. header_01
	25. hero
	26. Layout
	27. Grid Boostrap
	28. Font size
	29. Margin Padding
	30. Swiper
	31. Popup

--------------------------------------------------------------------------------*/

/* 1. base
--------------------------------------------------------------------------------*/

a[disabled], input[disabled], button[disabled], textarea[disabled] {
    cursor: not-allowed !important;
    opacity: .5 !important;
}

a:focus, input:focus, button:focus, textarea:focus {
    outline: none;
}

p {
    margin-top: 0;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    border: 0;
}

.page-wrap {
    overflow: hidden;
}

.awe-section {
    position: relative;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    z-index: 9;
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .awe-section {
        padding-top: calc(6.81818vw + 28.18182px);
        padding-bottom: calc(6.81818vw + 28.18182px);
    }
}

@media (min-width: 1200px) {
    .awe-section {
        padding-top: 110px;
        padding-bottom: 110px;
    }
}

.awe-text-left, .text-left {
    text-align: left !important;
}

.awe-text-center, .text-center {
    text-align: center !important;
}

.awe-text-right, .text-right {
    text-align: right !important;
}

.awe-text-underline {
    text-decoration: underline !important;
}

.awe-round {
    border-radius: 5px !important;
}

.awe-pill {
    border-radius: 50% !important;
}

.awe-tb {
    display: table;
    width: 100%;
    height: 100%;
}

.awe-tb__cell {
    display: table-cell;
    vertical-align: middle;
}

.awe-overlay, [data-gradient-bg] > canvas {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    z-index: -1;
}

.awe-overlay {
    background-color: rgba(0, 0, 0, .4);
}

.bg-fixed {
    background-attachment: fixed;
}

.awe-bg-cover {
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
}

.full {
    width: 100%;
    height: 100vh;
}

.embed-responsive {
    position: relative;
    display: block;
    height: 0;
    padding: 0;
    overflow: hidden;
}

.embed-responsive.embed-responsive-4by3 {
    padding-bottom: 75%;
}

.embed-responsive.embed-responsive-16by9 {
    padding-bottom: 56.25%;
}

.embed-responsive .embed-responsive-item, .embed-responsive iframe,
.embed-responsive embed, .embed-responsive object {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

/* table Responsive */

.table-responsive-01 {
    width: 100%;
    overflow-y: hidden;
    overflow-x: auto;
}

.table-responsive-01 table > thead > tr > th,
.table-responsive-01 table > thead > tr > td,
.table-responsive-01 table > tbody > tr > th,
.table-responsive-01 table > tbody > tr > td,
.table-responsive-01 table > tfoot > tr > th,
.table-responsive-01 table > tfoot > tr > td {
    white-space: nowrap;
}

@media (max-width: 991px) {
    .table-responsive-02 table, .table-responsive-02 thead,
    .table-responsive-02 tbody, .table-responsive-02 th, .table-responsive-02 td,
    .table-responsive-02 tr {
        display: block;
    }

    .table-responsive-02 thead {
        border-top: 1px solid #e8e8e8 !important;
        border-bottom: none !important;
    }

    .table-responsive-02 thead tr {
        position: absolute;
        top: -9999px;
        left: -9999px;
    }

    .table-responsive-02 tr {
        padding: 15px 0;
        border-left: 1px solid #e8e8e8;
        border-right: 1px solid #e8e8e8;
    }

    .table-responsive-02 td {
        position: relative;
        padding: 15px 10px 15px 30% !important;
    }

    .table-responsive-02 td:before {
        content: attr(data-th);
        position: absolute;
        top: 15px;
        left: 20px;
        width: 25%;
        padding-right: 10px;
    }
}

a {
    color: #bd1e2d;
}

a:hover {
    text-decoration: none;
    color: #bd1e2d;
}

a:focus {
    text-decoration: none;
}

::-moz-selection {
    color: #fff;
    background-color: #333;
}

::selection {
    color: #fff;
    background-color: #333;
}

.awe-section {
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .awe-section {
        padding-top: calc(7.95455vw + 24.54545px);
        padding-bottom: calc(7.95455vw + 24.54545px);
    }
}

@media (min-width: 1200px) {
    .awe-section {
        padding-top: 120px;
        padding-bottom: 120px;
    }
}

.awe-section2 {
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .awe-section2 {
        padding-top: calc(2.27273vw + 42.72727px);
        padding-bottom: calc(2.27273vw + 42.72727px);
    }
}

@media (min-width: 1200px) {
    .awe-section2 {
        padding-top: 70px;
        padding-bottom: 70px;
    }
}

.awe-section3 {
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .awe-section3 {
        padding-top: calc(-2.27273vw + 57.27273px);
        padding-bottom: calc(-2.27273vw + 57.27273px);
    }
}

@media (min-width: 1200px) {
    .awe-section3 {
        padding-top: 30px;
        padding-bottom: 30px;
    }
}

hr {
    margin-top: 10px;
    margin-bottom: 10px;
    border-color: #dfdfdf;
}

.page-wrap {
    position: relative;
}

.main-color {
    color: #bd1e2d;
}

@media (max-width: 479px) {
    .col-xxs-12 {
        width: 100% !important;
    }
}

/* 2. button
--------------------------------------------------------------------------------*/

.md-btn {
    display: inline-block;
    border: 2px solid #dfdfdf;
    box-shadow: none;
    outline: none;
    margin: 0;
    text-align: center;
    font-size: 14px;
    padding: 9px 12px;
    color: #000;
    background-color: transparent;
    transition: all .3s ease;
    text-decoration: none;
    vertical-align: middle;
    overflow: hidden;
    cursor: pointer;
    font-family: "Roboto", sans-serif;
    letter-spacing: 1px;
    text-transform: capitalize;
    line-height: 1;
}

.md-btn:hover {
    background-color: #333;
    color: #fff;
    border-color: #333;
}

.md-btn[disabled] {
    opacity: .65;
    cursor: not-allowed;
}

.md-btn--primary {
    background-color: #bd1e2d;
    color: #fff;
}

.md-btn--primary:hover {
    background-color: #000;
    color: #fff;
}

.md-btn--primary:focus {
    background-color: #000;
    color: #fff;
}

.md-btn--success {
    background-color: #5cb85c;
    color: #fff;
}

.md-btn--success:hover {
    background-color: #449d44;
    color: #fff;
}

.md-btn--success:focus {
    background-color: #449d44;
    color: #fff;
}

.md-btn--info {
    background-color: #5bc0de;
    color: #fff;
}

.md-btn--info:hover {
    background-color: #31b0d5;
    color: #fff;
}

.md-btn--info:focus {
    background-color: #31b0d5;
    color: #fff;
}

.md-btn--warning {
    background-color: #f0ad4e;
    color: #fff;
}

.md-btn--warning:hover {
    background-color: #ec971f;
    color: #fff;
}

.md-btn--warning:focus {
    background-color: #ec971f;
    color: #fff;
}

.md-btn--danger {
    background-color: #d9534f;
    color: #fff;
}

.md-btn--danger:hover {
    background-color: #c9302c;
    color: #fff;
}

.md-btn--danger:focus {
    background-color: #c9302c;
    color: #fff;
}

.md-btn--link {
    background-color: transparent;
    color: #fe6565;
}

.md-btn--link:hover {
    background-color: transparent;
    color: #fe6565;
    text-decoration: underline;
}

.md-btn--link:focus {
    background-color: transparent;
    color: #fe6565;
}

.md-btn--dark {
    background-color: #000;
    color: #fff;
}

.md-btn--dark:hover {
    background-color: #fe6565;
    color: #fff;
}

.md-btn--dark:focus {
    background-color: #fe6565;
    color: #fff;
}

.md-btn--xs {
    padding: 6px 15px;
    font-size: 12px;
}

.md-btn--sm {
    padding: 8px 15px;
    min-width: 100px;
    font-size: 12px;
}

.md-btn--md {
    padding: 10px 20px;
    min-width: 140px;
    font-size: 14px;
}

.md-btn--lg {
    padding: 14px 24px;
    min-width: 160px;
    font-size: 16px;
}

.md-btn--square {
    border-radius: 0;
}

.md-btn--round {
    border-radius: 5px;
}

.md-btn--pill {
    border-radius: 30px;
    border: none;
    line-height: 60px;
    padding: 0 60px;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: bold;
    z-index: 9;
    position: relative;
}

.md-btn--block {
    display: block;
    width: 100%;
}

.md-btn--disabled {
    opacity: .65;
    cursor: not-allowed;
}

/* 3. form-item
--------------------------------------------------------------------------------*/

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]),
select2, textarea, select, product__number:not([type="text"]) {
    box-shadow: none;
    outline: none;
    margin: 0;
    border-radius: 0;
    padding: 0 15px;
    line-height: 48px;
    border: 1px solid #dfdfdf;
    color: #000;
    font-size: 14px;
    vertical-align: middle;
    height: 50px;
    width: 100%;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"])::-webkit-input-placeholder,
select2::-webkit-input-placeholder, textarea::-webkit-input-placeholder,
select::-webkit-input-placeholder,
product__number:not([type="text"])::-webkit-input-placeholder {
    color: #e3e3e3;
    font-family: "Roboto", sans-serif;
    text-transform: capitalize;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"])::-moz-placeholder,
select2::-moz-placeholder, textarea::-moz-placeholder, select::-moz-placeholder,
product__number:not([type="text"])::-moz-placeholder {
    color: #e3e3e3;
    font-family: "Roboto", sans-serif;
    text-transform: capitalize;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):-moz-placeholder,
select2:-moz-placeholder, textarea:-moz-placeholder, select:-moz-placeholder,
product__number:not([type="text"]):-moz-placeholder {
    color: #e3e3e3;
    font-family: "Roboto", sans-serif;
    text-transform: capitalize;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):-ms-input-placeholder,
select2:-ms-input-placeholder, textarea:-ms-input-placeholder,
select:-ms-input-placeholder,
product__number:not([type="text"]):-ms-input-placeholder {
    color: #e3e3e3;
    font-family: "Roboto", sans-serif;
    text-transform: capitalize;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):focus,
select2:focus, textarea:focus, select:focus,
product__number:not([type="text"]):focus {
    border-color: #bd1e2d;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):focus::-webkit-input-placeholder,
select2:focus::-webkit-input-placeholder,
textarea:focus::-webkit-input-placeholder,
select:focus::-webkit-input-placeholder,
product__number:not([type="text"]):focus::-webkit-input-placeholder {
    color: #333;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):focus::-moz-placeholder,
select2:focus::-moz-placeholder, textarea:focus::-moz-placeholder,
select:focus::-moz-placeholder,
product__number:not([type="text"]):focus::-moz-placeholder {
    color: #333;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):focus:-moz-placeholder,
select2:focus:-moz-placeholder, textarea:focus:-moz-placeholder,
select:focus:-moz-placeholder,
product__number:not([type="text"]):focus:-moz-placeholder {
    color: #333;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]):focus:-ms-input-placeholder,
select2:focus:-ms-input-placeholder, textarea:focus:-ms-input-placeholder,
select:focus:-ms-input-placeholder,
product__number:not([type="text"]):focus:-ms-input-placeholder {
    color: #333;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"])[disabled],
select2[disabled], textarea[disabled], select[disabled],
product__number:not([type="text"])[disabled] {
    opacity: .65;
    cursor: not-allowed;
}

input:not([type="button"]):not([type="submit"]):not([type="radio"]):not([type="checkbox"]):not([type="color"]),
textarea {
    -webkit-appearance: none;
       -moz-appearance: none;
            appearance: none;
}

input[type="checkbox"], input[type="radio"] {
    width: auto !important;
}

textarea {
    line-height: 1.3;
    padding-top: 10px;
    padding-bottom: 10px;
    min-height: 80px;
    resize: none;
}

/* Typography */

body {
    margin: 0;
    padding: 0;
    line-height: 2em;
    font-size: 14px;
    font-weight: 400;
    font-family: "Roboto", sans-serif;
    color: #696969;
    letter-spacing: .3px;
}

body.awe-skin-dark {
    background-color: #333;
}

.awe-skin-dark {
    color: rgba(255, 255, 255, .8);
}

.awe-skin-dark h1, .awe-skin-dark h2, .awe-skin-dark h3, .awe-skin-dark h4,
.awe-skin-dark h5, .awe-skin-dark h6 {
    color: #fff;
}

p {
    margin-bottom: 16px;
}

a {
    transition: all .3s ease;
}

a, input, textarea, select {
    outline: none;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: 500;
    line-height: 2em;
    color: #333;
    font-family: "Roboto", sans-serif;
    letter-spacing: normal;
}

h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
    color: inherit;
    text-decoration: none;
}

h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover {
    color: inherit;
    text-decoration: none;
}

h1 {
    font-size: 60px;
}

h2 {
    font-size: 52px;
}

h3 {
    font-size: 44px;
}

h4 {
    font-size: 32px;
}

h5 {
    font-size: 28px;
}

h6 {
    font-size: 18px;
}

h3, h1, h2, h3 {
    margin-top: 30px;
    margin-bottom: 15px;
}

h4, h5, h6 {
    margin-top: 20px;
    margin-bottom: 10px;
}

img {
    max-width: 100%;
}

blockquote {
    position: relative;
    font-family: "Roboto", sans-serif;
    font-size: 18px;
    border: 0;
    padding: 0;
    margin: 0;
    margin-bottom: 30px;
}

blockquote p {
    font-style: italic;
    margin-bottom: 0;
}

blockquote i {
    font-size: 40px !important;
    margin-bottom: 20px;
}

blockquote cite {
    display: block;
    font-size: 16px;
    font-style: normal;
    font-family: "Roboto", sans-serif;
    font-weight: 700;
    margin-top: 15px;
}

blockquote small {
    font-weight: 400;
}

@media (min-width: 768px) {
    blockquote {
        font-size: 24px;
    }
}

abbr {
    color: #67dee8;
    border-width: 2px;
}

mark, .mark {
    background-color: #bd1e2d;
    color: #fff;
}

ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

/* 4. button
--------------------------------------------------------------------------------*/

.btn {
    text-transform: uppercase;
}

.btn-custom {
    position: relative;
    padding-right: 50px;
}

.btn-custom:after {
    content: '\F178';
    font-family: 'fontAwesome';
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
}

/* 5. box_image
--------------------------------------------------------------------------------*/

.box-image {
    position: relative;
    text-align: center;
    overflow: hidden;
    margin-bottom: 30px;
    max-width: 400px;
    margin: auto;
}

.box-image:hover .box-image__bg {
    transform: scale(1);
}

.box-image:hover .box-image__info {
    top: 94%;
}

.box-image:hover .box-image__tour {
    opacity: 0;
    visibility: hidden;
    height: 0;
}

.box-image:hover .box-image__bg:before {
    transform: translateY(75%);
}

.box-image:hover .box-image__country {
    font-weight: 300;
}

.box-image__bg {
    display: block;
    padding-top: 100%;
    background-size: cover;
    transform: scale(1.1);
}

.box-image__bg:before {
    content: "";
    position: absolute;
    top: -100px;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, .6) 20%, black 100%);
    opacity: .7;
    transform: translateY(0);
    transition: all .5s ease-in-out;
}

.box-image__bg img {
    display: none;
}

.box-image__country {
    color: #fff;
    font-weight: normal;
    font-size: 24px;
    margin: 0;
    transition: all .5s ease-in-out;
    transform: translateY(0);
}

.box-image__tour {
    color: #a9a9a9;
    transition: all .5s ease-in-out;
    transform: translateY(0);
}

.box-image__info {
    position: absolute;
    top: 55%;
    transform: translateY(-50%);
    left: 0;
    right: 0;
    margin: auto;
    transition: all .5s ease-in-out;
}

/* 6. box_image2
--------------------------------------------------------------------------------*/

.box-image2 {
    position: relative;
    overflow: hidden;
    max-width: 400px;
    margin: auto;
}

.box-image2 :hover .box-image2__bg {
    transform: scale(1);
}

.box-image2 :hover .box-image2__bg:before {
    height: 30%;
}

.box-image2 :hover .box-image2__info {
    padding: 10px 30px;
    top: 71%;
}

.box-image2 :hover .box-image2__info_bot {
    padding: 10px 30px;
}

.box-image2__bg {
    display: block;
    padding-top: 150%;
    background-size: cover;
    transform: scale(1.2);
}

.box-image2__bg:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    bottom: 0;
    left: 0;
    background: linear-gradient(transparent, rgba(0, 0, 0, .5), black);
    transition: all .5s ease-in-out;
    z-index: 99;
}

.box-image2__bg img {
    display: none;
}

.box-image2__info {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    padding: 30px;
    transform: translateY(0);
    transition: all .5s ease-in-out;
}

.box-image2__country {
    color: #fff;
    margin: 0;
    letter-spacing: .3px;
    margin-bottom: 8px;
}

.box-image2__tour {
    color: #fff;
    margin: 0;
    font-size: 24px;
    font-weight: 300;
}

.box-image2__info_bot {
    position: absolute;
    padding: 30px;
    bottom: 0;
    left: 0;
    right: 0;
    transition: all .5s ease-in-out;
}

.box-image2__info_bot:before {
    content: "";
    position: absolute;
    height: 1px;
    background: #fff;
    top: 0;
    left: 30px;
    right: 30px;
    margin: auto;
    opacity: .5;
    transition: all .5s ease-in-out;
}

.box-image2__date {
    color: #fff;
    font-size: 16px;
    font-weight: bold;
}

@media (min-width: 320px) {
    .box-image2__date {
        font-size: calc(.22727vw + 15.27273px);
    }
}

@media (min-width: 1200px) {
    .box-image2__date {
        font-size: 18px;
    }
}

.box-image2__view {
    float: right;
    color: #fff;
    position: relative;
    padding-right: 30px;
    font-size: 14px;
}

@media (min-width: 320px) {
    .box-image2__view {
        font-size: calc(.22727vw + 13.27273px);
    }
}

@media (min-width: 1200px) {
    .box-image2__view {
        font-size: 16px;
    }
}

.box-image2__view:before {
    content: "\F061";
    font-family: Fontawesome;
    font-size: 10px;
    position: absolute;
    top: 4px;
    right: 0;
    border: 2px solid;
    height: 20px;
    width: 20px;
    line-height: 14px;
    text-align: center;
    border-radius: 4px;
}

.box-image2__view:hover {
    color: #fff;
    opacity: .8;
}

/* 7. box_image3
--------------------------------------------------------------------------------*/

.box-image3 {
    position: relative;
    background-color: #fff;
    display: -ms-flexbox;
    display: flex;
    overflow: hidden;
    box-shadow: 0 10px 30px 0 rgba(0, 0, 0, .1);
}

.box-image3:after {
    content: '';
    display: block;
    clear: both;
}

.box-image3__box {
    width: 64%;
    position: relative;
    overflow: hidden;
    transition: all .5s ease-in-out;
}

.box-image3__box:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .2);
    cursor: pointer;
    opacity: 1;
    visibility: visible;
    z-index: 1;
    transition: all .5s ease-in-out;
}

.box-image3__box:hover:before {
    opacity: 0;
    visibility: hidden;
}

.box-image3__box:hover .box-image3__bg {
    transform: scale(1.2);
}

.box-image3__bg {
    display: block;
    background-size: cover;
    padding-top: 100%;
    transition: all .5s ease-in-out;
    width: 100%;
}

.box-image3__bg img {
    display: none;
}

.box-image3__info {
    position: absolute;
    left: 20px;
    top: 20px;
    z-index: 9;
}

.box-image3__country {
    color: #fff;
    font-size: 24px;
    font-weight: 300;
    margin-bottom: 5px;
}

.box-image3__date {
    color: #fff;
    font-size: 14px;
    font-weight: bold;
}

.box-image3__info_right {
    width: calc(100% - 64%);
    padding: 20px;
    position: relative;
    transition: all .5s ease-in-out;
    transform: translateX(0);
}

.box-image3__tour {
    font-weight: bold;
    line-height: 1.22222222;
}

.box-image3__text {
    line-height: 1.71428571;
}

.box-image3__view {
    position: absolute;
    bottom: 20px;
    left: 20px;
    padding-right: 30px;
    text-transform: capitalize;
    font-size: 16px;
}

.box-image3__view:before {
    content: "\F061";
    font-family: Fontawesome;
    font-size: 10px;
    position: absolute;
    top: 4px;
    right: 0;
    border: 2px solid;
    height: 20px;
    width: 20px;
    line-height: 14px;
    text-align: center;
    border-radius: 4px;
}

@media (max-width: 479px) {
    .box-image3 {
        -ms-flex-direction: column;
            flex-direction: column;
        margin-bottom: 15px;
    }

    .box-image3__box {
        width: 100%;
    }

    .box-image3__box:hover .box-image3__bg {
        width: 100%;
    }

    .box-image3__box:hover:before {
        width: 100%;
    }

    .box-image3__box:hover + .box-image3__info_right {
        transform: translateX(0);
    }

    .box-image3__info_right {
        width: 100%;
    }

    .box-image3__view {
        position: relative;
        left: 0;
        top: 0;
    }
}

/* 8. box_search
--------------------------------------------------------------------------------*/

.box-search {
    display: -ms-flexbox;
    display: flex;
    padding-top: 30px;
    padding-bottom: 30px;
    transition: all 1s;
}

.box-search .form__label {
    font-size: 20px;
    color: #000;
    margin-bottom: 0;
}

.box-search .form-item .select2-selection__arrow b {
    top: -15px !important;
}

.box-search .form-item {
    margin-bottom: 0;
    border-left: 1px solid #ddd;
    padding: 0 15px;
    width: 25%;
}

.box-search .form-item:first-child {
    border-left: none;
}

.box-search .md-btn {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 25%;
}

.box-search .select2-container {
    width: 100% !important;
}

.box-search__datepicker {
    margin: 0;
    position: relative;
}

.box-search__datepicker:before {
    content: "\F073";
    font-family: Fontawesome;
    position: absolute;
    right: 15px;
    top: 10px;
    color: #bd1e2d;
    font-size: 20px;
}

.box-search__datepicker span {
    font-size: 20px;
    color: #000;
    margin-bottom: 0;
}

.box-search__datepicker #datepicker {
    border: none;
    padding: 0;
    background: transparent;
    height: auto;
    line-height: normal;
}

.awe-section3 {
    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, .1);
}

.box_search_wrap.sticky {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 99;
    width: 100%;
    background: #fff;
}

@media (max-width: 991px) {
    .box-search {
        -ms-flex-wrap: wrap;
            flex-wrap: wrap;
    }

    .box-search .form-item {
        width: 50%;
        margin-bottom: 20px;
        border-left: none;
    }

    .box-search .md-btn {
        margin-bottom: 20px;
        width: 50%;
    }
}

@media (max-width: 767px) {
    .box-search .form-item {
        width: 100%;
    }

    .box-search .form-item {
        width: 100%;
    }

    .box-search .md-btn {
        width: 100%;
    }
}

.fixed_height_box_search + .box-search-wrapper {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    box-shadow: 1px 1px 5px #ccc;
    background-color: #fff;
}

.fixed_height_box_search + .box-search-wrapper.sticky {
    position: fixed;
    background-color: #fff;
}

.fixed_height_box_search + .box-search-wrapper.sticky .box-search {
    padding-top: 12px;
    padding-bottom: 12px;
}

.select2-dropdown {
    z-index: 9999;
}

@media (max-width: 991px) {
    .fixed_height_box_search + .box-search-wrapper.sticky {
        position: absolute;
    }
}

/* 9. box_share
--------------------------------------------------------------------------------*/

.box-share {
    position: fixed;
    top: 0;
    z-index: 99999;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
        flex-direction: column;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
    right: 0;
}

.box-share .social-icon {
    color: #fff;
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    margin: 0;
    display: block;
    font-size: 20px;
}

.box-share .social-icon .social-icon__icon {
    width: 50px;
}

.box-share .social-icon:hover {
    background-color: #fff;
    color: #bd1e2d;
}

.box-share__socialicon_wrap {
    background-color: #bd1e2d;
}

/* 10. general_breadcrumb
--------------------------------------------------------------------------------*/

.breadcrumb {
    display: inline-block;
}

.breadcrumb li {
    display: inline-block;
    font-family: 300;
    font-size: 14px;
    text-transform: uppercase;
}

@media (min-width: 320px) {
    .breadcrumb li {
        font-size: calc(.45455vw + 12.54545px);
    }
}

@media (min-width: 1200px) {
    .breadcrumb li {
        font-size: 18px;
    }
}

.breadcrumb li + li:before {
    content: '|';
    padding: 0 15px;
}

.breadcrumb li a:hover {
    color: #fff;
}

.breadcrumb li span {
    color: #fff;
}

/* 11. expert
--------------------------------------------------------------------------------*/

.expert:hover .expert__avatar {
    transform: rotateY(360deg);
}

.expert__avatar {
    border-radius: 50%;
    overflow: hidden;
    width: 80px;
    height: 80px;
    float: left;
    margin-right: 20px;
    transition: all .8s ease-in-out;
}

.expert__body {
    height: 80px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
        flex-direction: column;
    -ms-flex-pack: center;
    justify-content: center;
    float: left;
}

.expert__name {
    font-weight: bold;
    margin: 0;
}

.expert__style-02 .expert__avatar {
    width: 95px;
    height: 95px;
}

.expert__style-02 .expert__body {
    height: 95px;
}

/* 12. form_item
--------------------------------------------------------------------------------*/

.form-item {
    margin-bottom: 15px;
}

.form-item:after {
    content: '';
    display: table;
    clear: both;
}

.form-item:before {
    content: '';
    display: table;
    clear: both;
}

.form-item .fa-map-marker {
    position: absolute;
    left: 15px;
    top: 0;
    z-index: 99;
    line-height: 50px;
    color: #b0bec5;
}

.form-item .fa-mobile {
    position: absolute;
    left: 15px;
    top: 0;
    z-index: 99;
    line-height: 50px;
    color: #b0bec5;
}

.form-item .fa-caret-down {
    position: absolute;
    right: 15px;
    top: 0;
    z-index: 9;
    line-height: 50px;
    color: #b0bec5;
}

.form-item .select2-search__field {
    padding-left: 30px !important;
    width: 100% !important;
}

.form-item .select2-selection__choice {
    padding-left: 35px !important;
}

.form-item .select2-selection--multiple {
    border: none !important;
}

.form-item .select2-selection__arrow b {
    border: none !important;
    top: 0 !important;
    left: auto !important;
    right: 15px !important;
    width: auto !important;
}

.form-item .select2-selection__arrow b:before {
    content: "\F078";
    font-family: Fontawesome;
    color: #bd1e2d;
}

.form-item .select2-selection--single {
    border: none;
}

.form-item .select2-selection__rendered {
    padding-left: 0 !important;
    color: #ccc !important;
}

.form-item .select2-selection--single:focus {
    outline: none !important;
}

.form__label {
    display: block;
    font-size: 14px;
    text-transform: capitalize;
    margin-bottom: 10px;
}

@media (min-width: 769px) {
    .form-item--half {
        width: 50%;
        float: left;
    }
}

.form-item--btn {
    padding-left: 8px !important;
    padding-right: 8px !important;
}

.form-item--btn .md-btn {
    margin: 5px 7px;
}

.form-wrapper {
    margin-left: -15px;
    margin-right: -15px;
    overflow: hidden;
}

.form-wrapper .form-item {
    padding-left: 15px;
    padding-right: 15px;
}

.grid-css .grid-item .grid-item__inner {
    position: relative;
}

.grid-css.grid-css--grid .grid-item__content-wrapper {
    position: absolute;
}

.grid-css.grid-css--grid .grid-item__content-wrapper {
    margin: 0 !important;
}

.grid-css.grid-css--grid .grid-item__inner {
    padding-top: 100%;
}

.grid-css.grid-css--grid .grid-item.extra-large .grid-item__inner,
.grid-css.grid-css--grid .grid-item.wide .grid-item__inner {
    padding-top: 50%;
}

.grid-css.grid-css--grid .grid-item.high .grid-item__inner {
    padding-top: 200%;
}

.grid-css.grid-css--grid[data-ratio="4by3"] .grid-item__inner {
    padding-top: 75%;
}

.grid-css.grid-css--grid[data-ratio="4by3"] .grid-item.extra-large .grid-item__inner,
.grid-css.grid-css--grid[data-ratio="4by3"] .grid-item.wide .grid-item__inner {
    padding-top: 37.5%;
}

.grid-css.grid-css--grid[data-ratio="4by3"] .grid-item.high .grid-item__inner {
    padding-top: 150%;
}

.grid-css.grid-css--grid[data-ratio="16by9"] .grid-item__inner {
    padding-top: 56.25%;
}

.grid-css.grid-css--grid[data-ratio="16by9"] .grid-item.extra-large .grid-item__inner,
.grid-css.grid-css--grid[data-ratio="16by9"] .grid-item.wide .grid-item__inner {
    padding-top: 28.125%;
}

.grid-css.grid-css--grid[data-ratio="16by9"] .grid-item.high .grid-item__inner {
    padding-top: 112.5%;
}

[data-col-xs="1"].grid-css .grid-item, [data-col-xs="1"].grid-css .grid-sizer {
    width: 100%;
}

[data-col-xs="2"].grid-css .grid-item, [data-col-xs="2"].grid-css .grid-sizer {
    width: 50%;
}

[data-col-xs="2"].grid-css .grid-item.wide,
[data-col-xs="2"].grid-css .grid-item.large {
    width: 100%;
}

[data-col-xs="2"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="3"].grid-css .grid-item, [data-col-xs="3"].grid-css .grid-sizer {
    width: 33.33333%;
}

[data-col-xs="3"].grid-css .grid-item.wide,
[data-col-xs="3"].grid-css .grid-item.large {
    width: 66.66667%;
}

[data-col-xs="3"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="4"].grid-css .grid-item, [data-col-xs="4"].grid-css .grid-sizer {
    width: 25%;
}

[data-col-xs="4"].grid-css .grid-item.wide,
[data-col-xs="4"].grid-css .grid-item.large {
    width: 50%;
}

[data-col-xs="4"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="5"].grid-css .grid-item, [data-col-xs="5"].grid-css .grid-sizer {
    width: 20%;
}

[data-col-xs="5"].grid-css .grid-item.wide,
[data-col-xs="5"].grid-css .grid-item.large {
    width: 40%;
}

[data-col-xs="5"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="6"].grid-css .grid-item, [data-col-xs="6"].grid-css .grid-sizer {
    width: 16.66667%;
}

[data-col-xs="6"].grid-css .grid-item.wide,
[data-col-xs="6"].grid-css .grid-item.large {
    width: 33.33333%;
}

[data-col-xs="6"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="7"].grid-css .grid-item, [data-col-xs="7"].grid-css .grid-sizer {
    width: 14.28571%;
}

[data-col-xs="7"].grid-css .grid-item.wide,
[data-col-xs="7"].grid-css .grid-item.large {
    width: 28.57143%;
}

[data-col-xs="7"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="8"].grid-css .grid-item, [data-col-xs="8"].grid-css .grid-sizer {
    width: 12.5%;
}

[data-col-xs="8"].grid-css .grid-item.wide,
[data-col-xs="8"].grid-css .grid-item.large {
    width: 25%;
}

[data-col-xs="8"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="9"].grid-css .grid-item, [data-col-xs="9"].grid-css .grid-sizer {
    width: 11.11111%;
}

[data-col-xs="9"].grid-css .grid-item.wide,
[data-col-xs="9"].grid-css .grid-item.large {
    width: 22.22222%;
}

[data-col-xs="9"].grid-css .grid-item.extra-large {
    width: 100%;
}

[data-col-xs="10"].grid-css .grid-item, [data-col-xs="10"].grid-css .grid-sizer {
    width: 10%;
}

[data-col-xs="10"].grid-css .grid-item.wide,
[data-col-xs="10"].grid-css .grid-item.large {
    width: 20%;
}

[data-col-xs="10"].grid-css .grid-item.extra-large {
    width: 100%;
}

@media (min-width: 768px) {
    [data-col-sm="1"].grid-css .grid-item,
    [data-col-sm="1"].grid-css .grid-sizer {
        width: 100%;
    }

    [data-col-sm="2"].grid-css .grid-item,
    [data-col-sm="2"].grid-css .grid-sizer {
        width: 50%;
    }

    [data-col-sm="2"].grid-css .grid-item.wide,
    [data-col-sm="2"].grid-css .grid-item.large {
        width: 100%;
    }

    [data-col-sm="2"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="3"].grid-css .grid-item,
    [data-col-sm="3"].grid-css .grid-sizer {
        width: 33.33333%;
    }

    [data-col-sm="3"].grid-css .grid-item.wide,
    [data-col-sm="3"].grid-css .grid-item.large {
        width: 66.66667%;
    }

    [data-col-sm="3"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="4"].grid-css .grid-item,
    [data-col-sm="4"].grid-css .grid-sizer {
        width: 25%;
    }

    [data-col-sm="4"].grid-css .grid-item.wide,
    [data-col-sm="4"].grid-css .grid-item.large {
        width: 50%;
    }

    [data-col-sm="4"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="5"].grid-css .grid-item,
    [data-col-sm="5"].grid-css .grid-sizer {
        width: 20%;
    }

    [data-col-sm="5"].grid-css .grid-item.wide,
    [data-col-sm="5"].grid-css .grid-item.large {
        width: 40%;
    }

    [data-col-sm="5"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="6"].grid-css .grid-item,
    [data-col-sm="6"].grid-css .grid-sizer {
        width: 16.66667%;
    }

    [data-col-sm="6"].grid-css .grid-item.wide,
    [data-col-sm="6"].grid-css .grid-item.large {
        width: 33.33333%;
    }

    [data-col-sm="6"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="7"].grid-css .grid-item,
    [data-col-sm="7"].grid-css .grid-sizer {
        width: 14.28571%;
    }

    [data-col-sm="7"].grid-css .grid-item.wide,
    [data-col-sm="7"].grid-css .grid-item.large {
        width: 28.57143%;
    }

    [data-col-sm="7"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="8"].grid-css .grid-item,
    [data-col-sm="8"].grid-css .grid-sizer {
        width: 12.5%;
    }

    [data-col-sm="8"].grid-css .grid-item.wide,
    [data-col-sm="8"].grid-css .grid-item.large {
        width: 25%;
    }

    [data-col-sm="8"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="9"].grid-css .grid-item,
    [data-col-sm="9"].grid-css .grid-sizer {
        width: 11.11111%;
    }

    [data-col-sm="9"].grid-css .grid-item.wide,
    [data-col-sm="9"].grid-css .grid-item.large {
        width: 22.22222%;
    }

    [data-col-sm="9"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-sm="10"].grid-css .grid-item,
    [data-col-sm="10"].grid-css .grid-sizer {
        width: 10%;
    }

    [data-col-sm="10"].grid-css .grid-item.wide,
    [data-col-sm="10"].grid-css .grid-item.large {
        width: 20%;
    }

    [data-col-sm="10"].grid-css .grid-item.extra-large {
        width: 100%;
    }
}

@media (min-width: 992px) {
    [data-col-md="1"].grid-css .grid-item,
    [data-col-md="1"].grid-css .grid-sizer {
        width: 100%;
    }

    [data-col-md="2"].grid-css .grid-item,
    [data-col-md="2"].grid-css .grid-sizer {
        width: 50%;
    }

    [data-col-md="2"].grid-css .grid-item.wide,
    [data-col-md="2"].grid-css .grid-item.large {
        width: 100%;
    }

    [data-col-md="2"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="3"].grid-css .grid-item,
    [data-col-md="3"].grid-css .grid-sizer {
        width: 33.33333%;
    }

    [data-col-md="3"].grid-css .grid-item.wide,
    [data-col-md="3"].grid-css .grid-item.large {
        width: 66.66667%;
    }

    [data-col-md="3"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="4"].grid-css .grid-item,
    [data-col-md="4"].grid-css .grid-sizer {
        width: 25%;
    }

    [data-col-md="4"].grid-css .grid-item.wide,
    [data-col-md="4"].grid-css .grid-item.large {
        width: 50%;
    }

    [data-col-md="4"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="5"].grid-css .grid-item,
    [data-col-md="5"].grid-css .grid-sizer {
        width: 20%;
    }

    [data-col-md="5"].grid-css .grid-item.wide,
    [data-col-md="5"].grid-css .grid-item.large {
        width: 40%;
    }

    [data-col-md="5"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="6"].grid-css .grid-item,
    [data-col-md="6"].grid-css .grid-sizer {
        width: 16.66667%;
    }

    [data-col-md="6"].grid-css .grid-item.wide,
    [data-col-md="6"].grid-css .grid-item.large {
        width: 33.33333%;
    }

    [data-col-md="6"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="7"].grid-css .grid-item,
    [data-col-md="7"].grid-css .grid-sizer {
        width: 14.28571%;
    }

    [data-col-md="7"].grid-css .grid-item.wide,
    [data-col-md="7"].grid-css .grid-item.large {
        width: 28.57143%;
    }

    [data-col-md="7"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="8"].grid-css .grid-item,
    [data-col-md="8"].grid-css .grid-sizer {
        width: 12.5%;
    }

    [data-col-md="8"].grid-css .grid-item.wide,
    [data-col-md="8"].grid-css .grid-item.large {
        width: 25%;
    }

    [data-col-md="8"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="9"].grid-css .grid-item,
    [data-col-md="9"].grid-css .grid-sizer {
        width: 11.11111%;
    }

    [data-col-md="9"].grid-css .grid-item.wide,
    [data-col-md="9"].grid-css .grid-item.large {
        width: 22.22222%;
    }

    [data-col-md="9"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-md="10"].grid-css .grid-item,
    [data-col-md="10"].grid-css .grid-sizer {
        width: 10%;
    }

    [data-col-md="10"].grid-css .grid-item.wide,
    [data-col-md="10"].grid-css .grid-item.large {
        width: 20%;
    }

    [data-col-md="10"].grid-css .grid-item.extra-large {
        width: 100%;
    }
}

@media (min-width: 1200px) {
    [data-col-lg="1"].grid-css .grid-item,
    [data-col-lg="1"].grid-css .grid-sizer {
        width: 100%;
    }

    [data-col-lg="2"].grid-css .grid-item,
    [data-col-lg="2"].grid-css .grid-sizer {
        width: 50%;
    }

    [data-col-lg="2"].grid-css .grid-item.wide,
    [data-col-lg="2"].grid-css .grid-item.large {
        width: 100%;
    }

    [data-col-lg="2"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="3"].grid-css .grid-item,
    [data-col-lg="3"].grid-css .grid-sizer {
        width: 33.33333%;
    }

    [data-col-lg="3"].grid-css .grid-item.wide,
    [data-col-lg="3"].grid-css .grid-item.large {
        width: 66.66667%;
    }

    [data-col-lg="3"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="4"].grid-css .grid-item,
    [data-col-lg="4"].grid-css .grid-sizer {
        width: 25%;
    }

    [data-col-lg="4"].grid-css .grid-item.wide,
    [data-col-lg="4"].grid-css .grid-item.large {
        width: 50%;
    }

    [data-col-lg="4"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="5"].grid-css .grid-item,
    [data-col-lg="5"].grid-css .grid-sizer {
        width: 20%;
    }

    [data-col-lg="5"].grid-css .grid-item.wide,
    [data-col-lg="5"].grid-css .grid-item.large {
        width: 40%;
    }

    [data-col-lg="5"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="6"].grid-css .grid-item,
    [data-col-lg="6"].grid-css .grid-sizer {
        width: 16.66667%;
    }

    [data-col-lg="6"].grid-css .grid-item.wide,
    [data-col-lg="6"].grid-css .grid-item.large {
        width: 33.33333%;
    }

    [data-col-lg="6"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="7"].grid-css .grid-item,
    [data-col-lg="7"].grid-css .grid-sizer {
        width: 14.28571%;
    }

    [data-col-lg="7"].grid-css .grid-item.wide,
    [data-col-lg="7"].grid-css .grid-item.large {
        width: 28.57143%;
    }

    [data-col-lg="7"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="8"].grid-css .grid-item,
    [data-col-lg="8"].grid-css .grid-sizer {
        width: 12.5%;
    }

    [data-col-lg="8"].grid-css .grid-item.wide,
    [data-col-lg="8"].grid-css .grid-item.large {
        width: 25%;
    }

    [data-col-lg="8"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="9"].grid-css .grid-item,
    [data-col-lg="9"].grid-css .grid-sizer {
        width: 11.11111%;
    }

    [data-col-lg="9"].grid-css .grid-item.wide,
    [data-col-lg="9"].grid-css .grid-item.large {
        width: 22.22222%;
    }

    [data-col-lg="9"].grid-css .grid-item.extra-large {
        width: 100%;
    }

    [data-col-lg="10"].grid-css .grid-item,
    [data-col-lg="10"].grid-css .grid-sizer {
        width: 10%;
    }

    [data-col-lg="10"].grid-css .grid-item.wide,
    [data-col-lg="10"].grid-css .grid-item.large {
        width: 20%;
    }

    [data-col-lg="10"].grid-css .grid-item.extra-large {
        width: 100%;
    }
}

[data-gap="5"].grid-css .grid__inner {
    margin: -3px;
}

[data-gap="5"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 3px;
    top: 3px;
    right: 3px;
    bottom: 3px;
    left: 3px;
}

[data-gap="10"].grid-css .grid__inner {
    margin: -5px;
}

[data-gap="10"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 5px;
    top: 5px;
    right: 5px;
    bottom: 5px;
    left: 5px;
}

[data-gap="15"].grid-css .grid__inner {
    margin: -8px;
}

[data-gap="15"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 8px;
    top: 8px;
    right: 8px;
    bottom: 8px;
    left: 8px;
}

[data-gap="20"].grid-css .grid__inner {
    margin: -10px;
}

[data-gap="20"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 10px;
    top: 10px;
    right: 10px;
    bottom: 10px;
    left: 10px;
}

[data-gap="25"].grid-css .grid__inner {
    margin: -13px;
}

[data-gap="25"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 13px;
    top: 13px;
    right: 13px;
    bottom: 13px;
    left: 13px;
}

[data-gap="30"].grid-css .grid__inner {
    margin: -15px;
}

[data-gap="30"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 15px;
    top: 15px;
    right: 15px;
    bottom: 15px;
    left: 15px;
}

[data-gap="35"].grid-css .grid__inner {
    margin: -18px;
}

[data-gap="35"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 18px;
    top: 18px;
    right: 18px;
    bottom: 18px;
    left: 18px;
}

[data-gap="40"].grid-css .grid__inner {
    margin: -20px;
}

[data-gap="40"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 20px;
    top: 20px;
    right: 20px;
    bottom: 20px;
    left: 20px;
}

[data-gap="45"].grid-css .grid__inner {
    margin: -23px;
}

[data-gap="45"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 23px;
    top: 23px;
    right: 23px;
    bottom: 23px;
    left: 23px;
}

[data-gap="50"].grid-css .grid__inner {
    margin: -25px;
}

[data-gap="50"].grid-css .grid__inner .grid-item .grid-item__content-wrapper {
    margin: 25px;
    top: 25px;
    right: 25px;
    bottom: 25px;
    left: 25px;
}

/* 13. grid-css
--------------------------------------------------------------------------------*/

.grid-css {
    margin: 0;
}

.grid-css .grid-item, .grid-css .grid-sizer {
    width: 100%;
}

.grid-css .grid-item .grid-item__inner .grid-item__content-wrapper {
    background-color: #ccc;
}

.grid-css.grid-css--grid .grid-item__content-wrapper {
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.filter {
    margin: 0 -10px 30px;
}

.filter li {
    display: inline-block;
}

.filter li.current a {
    color: #bd1e2d;
}

.filter a {
    display: block;
    position: relative;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
    color: #696969;
    padding: 5px 10px;
}

.grid-css .grid-item .grid-item__inner .grid-item__content-wrapper {
    background-color: transparent;
}

/* 14. page_title
--------------------------------------------------------------------------------*/

.page-title {
    position: relative;
    padding: 80px 0 80px;
    background-color: #e3e3e3;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    z-index: 9;
}

.page-title__titlewrap {
    text-align: center;
}

.page-title__titlewrap .breadcrumb {
    margin-top: 10px;
}

@media (min-width: 320px) {
    .page-title__titlewrap .breadcrumb {
        margin-top: calc(3.40909vw - .90909px);
    }
}

@media (min-width: 1200px) {
    .page-title__titlewrap .breadcrumb {
        margin-top: 40px;
    }
}

.page-title__titlewrap .breadcrumb li a {
    color: rgba(255, 255, 255, .6);
}

.page-title__titlewrap .breadcrumb li a:hover {
    color: #bd1e2d;
}

.page-title__title {
    font-size: 40px;
    font-weight: 300;
    line-height: 1.1;
    text-align: center;
    text-transform: capitalize;
    color: #fff;
    margin: 0;
}

@media (min-width: 320px) {
    .page-title__title {
        font-size: calc(2.72727vw + 31.27273px);
    }
}

@media (min-width: 1200px) {
    .page-title__title {
        font-size: 64px;
    }
}

.page-title__cat {
    display: inline-block;
    white-space: nowrap;
    max-width: 200px;
    height: 30px;
    line-height: 30px;
    font-size: 12px;
    letter-spacing: 1px;
    text-overflow: eclli;
    text-transform: uppercase;
    color: #fff;
    background-color: #000;
    border-radius: 20px;
    padding: 0 15px;
    margin-bottom: 40px;
}

@media (min-width: 993px) {
    .page-title {
        padding: 0;
        height: calc(100vh - 120px);
    }

    .page-title__breadcrumb {
        top: 50px;
    }

    .page-title__titlewrap {
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        z-index: 9;
        transform: translateY(-50%);
    }
}

/* 15. socialicon
--------------------------------------------------------------------------------*/

/* 16. socialicon
--------------------------------------------------------------------------------*/

.social-icon {
    display: inline-block;
    margin: 5px 10px;
    transition: all .3s ease;
    color: #333;
    position: relative;
}

.social-icon__text {
    margin-left: 6px;
}

/* 17. swiper
--------------------------------------------------------------------------------*/

/* 18. title
--------------------------------------------------------------------------------*/

.title {
    margin-bottom: 40px;
    text-align: center;
}

.title__title {
    line-height: 64px;
    margin-top: 0;
    margin-bottom: 0;
    font-weight: 300;
    z-index: 2;
    position: relative;
    font-size: 30px;
}

@media (min-width: 320px) {
    .title__title {
        font-size: calc(2.04545vw + 23.45455px);
    }
}

@media (min-width: 1200px) {
    .title__title {
        font-size: 48px;
    }
}

.title__title span {
    font-weight: 500;
}

.title__text {
    margin: 30px 0;
    font-size: 16px;
    z-index: 2;
    position: relative;
    padding-left: 20px;
    padding-right: 20px;
}

@media (min-width: 320px) {
    .title__text {
        padding-left: calc(18.18182vw - 38.18182px);
        padding-right: calc(18.18182vw - 38.18182px);
    }
}

@media (min-width: 1200px) {
    .title__text {
        padding-left: 180px;
        padding-right: 180px;
    }
}

.title__title_small {
    font-size: 24px;
    margin: 0;
    z-index: 2;
    position: relative;
}

.title__style-02 {
    text-align: left;
}

.title__style-02 .title__text {
    padding: 0;
}

.title__style-03 {
    text-align: left;
}

.title__style-03 .title__text {
    font-size: 16px;
    padding: 0;
    padding-right: 40%;
}

@media (max-width: 991px) {
    .title__style-03 .title__text {
        padding-right: 0;
    }
}

.title__style-04 {
    text-align: left;
}

.title__style-04 .title__title {
    font-size: 28px;
}

.title__style-04 .title__text {
    padding: 0 25px;
    margin: 20px 0;
}

/* 19. widget_image
--------------------------------------------------------------------------------*/

/* 20. general_widget_image
--------------------------------------------------------------------------------*/

/* 21. general_widget_list
--------------------------------------------------------------------------------*/

.widget_list {
    list-style: none;
}

.column-2 {
    -webkit-column-count: 2;
            column-count: 2;
}

@media (max-width: 479px) {
    .column-2 {
        -webkit-column-count: 1;
                column-count: 1;
    }
}

/* 22. widget_text
--------------------------------------------------------------------------------*/

.widget_text {
    border: 1px solid transparent;
}

.widget_text__title {
    font-size: 24px;
    font-weight: 300;
    margin: 0;
    font-size: 16px;
}

@media (min-width: 320px) {
    .widget_text__title {
        font-size: calc(.90909vw + 13.09091px);
    }
}

@media (min-width: 1200px) {
    .widget_text__title {
        font-size: 24px;
    }
}

.widget_text__title a:hover {
    color: #bd1e2d;
}

/* 23. footer
--------------------------------------------------------------------------------*/

.footer {
    position: relative;
    background-color: #bd1e2d;
    color: #fff;
    padding: 40px 0;
    background: #bd1e2d;
}

.footer #back-to-top {
    position: absolute;
    width: 40px;
    height: 40px;
    left: 50%;
    transform: translateX(-50%);
    top: -20px;
    height: 40px;
    line-height: 48px;
    color: #333;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, .3);
    cursor: pointer;
    font-size: 36px;
    text-align: center;
    z-index: 99;
}

.footer .widget_list a {
    color: #fff;
    opacity: .7;
}

.footer .widget_list a:hover {
    opacity: 1;
    padding-left: 10px;
}

.footer .form-item {
    margin-bottom: 0;
}

.footer__wrapper {
    position: relative;
    padding: 21px 0;
    z-index: 999;
}

.footer__social {
    margin-bottom: 0;
}

.footer__social a {
    color: #fff;
}

.footer__social a:hover {
    opacity: .8;
}

.footer__copy {
    margin-bottom: 0;
    display: inline-block;
}

@media (min-width: 993px) {
    .footer {
        padding: 80px 0;
    }
}

.footer__title {
    color: #fff;
    text-transform: capitalize;
}

.footer__form_wrapper {
    position: relative;
    margin-bottom: 40px;
}

.footer__btn_custom {
    position: absolute;
    right: 0;
    top: 0;
    border: none;
    line-height: 50px;
    height: 100%;
    padding: 0 15px;
    background-color: #e3e3e3;
    color: #bd1e2d;
}

.footer__backtotop {
    float: right;
    cursor: pointer;
}

.footer__backtotop i {
    margin-right: 5px;
}

/* 24. header_01
--------------------------------------------------------------------------------*/

.header {
    padding: 10px 0;
    transition: all .3s cubic-bezier(.91, .04, .13, .99);
    position: relative;
}

.header.header--fixed {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 999;
}

.header.is-scroll {
    top: 0;
    box-shadow: 0 2px 50px 0 rgba(0, 0, 0, .1);
    background-color: rgba(0, 0, 0, .8);
}

.header__inner {
    position: relative;
    padding-right: 45px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
    padding-left: 20px;
    padding-right: 20px;
}

@media (min-width: 320px) {
    .header__inner {
        padding-left: calc(-1.13636vw + 23.63636px);
        padding-right: calc(-1.13636vw + 23.63636px);
    }
}

@media (min-width: 1200px) {
    .header__inner {
        padding-left: calc(35vw - 410px);
        padding-right: calc(35vw - 410px);
    }
}

@media (min-width: 1400px) {
    .header__inner {
        padding-left: 80px;
        padding-right: 80px;
    }
}

.header__logo {
    float: left;
}

.header__menu {
    float: left;
    margin-left: 50px;
}

.onepage-nav {
    z-index: 999;
}

.onepage-nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    font-size: 0;
}

.onepage-nav li {
    position: relative;
    z-index: 9;
}

.onepage-nav li a {
    display: block;
    position: relative;
    text-decoration: none;
}

@media (min-width: 1201px) {
    .onepage-nav {
        text-align: center;
    }

    .onepage-nav li:hover > a {
        color: #fff;
    }

    .onepage-nav .onepage-menu .sub-menu {
        opacity: 0;
        visibility: hidden;
    }

    .onepage-nav .onepage-menu li:hover > .sub-menu {
        opacity: 1;
        visibility: visible;
    }

    .onepage-nav .onepage-menu a {
        padding: 20px 30px;
    }

    .onepage-nav .onepage-menu .sub-menu {
        text-align: left;
        padding: 0 2px;
    }

    .onepage-nav .onepage-menu .sub-menu li {
        background-color: #111;
    }

    .onepage-nav .onepage-menu .sub-menu li:first-child {
        padding-top: 18px;
    }

    .onepage-nav .onepage-menu .sub-menu li:last-child {
        padding-bottom: 18px;
    }

    .onepage-nav .onepage-menu .sub-menu a {
        color: #eee;
        padding: 2px 25px;
    }

    .onepage-nav .onepage-menu .sub-menu a:after {
        right: 15px;
    }

    .onepage-nav .onepage-menu > li {
        display: inline-block;
    }

    .onepage-nav .onepage-menu a {
        font-size: 14px;
        color: #fff;
        transition: all 300ms ease;
        font-family: "Roboto", sans-serif;
        font-weight: 500;
        letter-spacing: .5px;
        text-transform: capitalize;
        padding: 10px 20px;
    }

    .onepage-nav .onepage-menu .sub-menu {
        display: block !important;
    }

    .onepage-nav .onepage-menu .sub-menu .current-menu-parent > a,
    .onepage-nav .onepage-menu .sub-menu .current-menu-item > a {
        color: #fff;
    }

    .onepage-nav .onepage-menu .current-menu-parent > a,
    .onepage-nav .onepage-menu .current-menu-item > a {
        color: #fff;
    }

    .onepage-nav .onepage-menu .sub-menu {
        width: 200px;
        position: absolute;
        top: 100%;
        z-index: -1;
        left: 0;
        transition: all 300ms ease;
    }

    .onepage-nav .onepage-menu .sub-menu .sub-menu {
        top: 0;
        left: 100%;
    }

    .onepage-nav .onepage-menu .sub-menu li > a {
        font-size: 14px;
        transition: all 300ms ease;
    }

    .onepage-nav .onepage-menu .sub-menu li:hover > a {
        color: #4aa8ff;
    }

    .onepage-nav .onepage-toggle-menu {
        display: none;
    }
}

@media (max-width: 1200px) {
    .onepage-nav .onepage-menu {
        position: fixed;
        top: 0;
        will-change: transform;
    }

    .onepage-nav .onepage-menu a {
        font-size: 14px;
    }

    .onepage-nav .onepage-menu a:after {
        right: 0;
        width: 50px;
        text-align: center;
    }

    .onepage-nav .onepage-menu .sub-menu {
        display: none;
    }

    .onepage-nav .onepage-menu {
        background-color: #111;
    }

    .onepage-nav .onepage-menu a {
        border-bottom: 1px solid rgba(255, 255, 255, .1);
        color: #eee;
    }

    .onepage-nav .onepage-menu a:after {
        border-left: 1px solid rgba(255, 255, 255, .1);
    }

    .onepage-nav .onepage-menu {
        left: 0;
        width: 280px;
        background-color: #111;
        transform: translate(-100%, 0);
    }

    .onepage-nav .active.onepage-menu {
        transform: translate(0, 0);
    }

    .onepage-nav .onepage-menu {
        z-index: 99999;
        height: 100%;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: left;
        width: 300px;
        transition: all 300ms ease;
    }

    .onepage-nav .onepage-menu li {
        position: relative;
    }

    .onepage-nav .onepage-menu a {
        padding: 12px 15px;
        font-size: 16px;
        text-transform: capitalize;
        color: #696969;
    }

    .onepage-nav .onepage-menu a:hover {
        color: #fff;
    }

    .onepage-nav .onepage-menu .active > a {
        color: #fff;
    }

    .onepage-nav .onepage-menu .current-menu-parent > a,
    .onepage-nav .onepage-menu .current-menu-item > a {
        color: #fff;
    }

    .onepage-nav .onepage-menu .sub-menu a {
        padding: 12px 15px;
    }

    .onepage-nav .onepage-menu .sub-menu .menu-item-has-children > a:hover {
        color: #4aa8ff;
    }

    .onepage-nav .onepage-menu .sub-menu .menu-item-has-children.active > a {
        color: #4aa8ff;
    }

    .onepage-nav .onepage-toggle-menu {
        display: block;
    }
}

.onepage-nav {
    display: inline-block;
    vertical-align: middle;
}

.onepage-nav li.current a {
    color: #fff;
}

.onepage-menu.active ~ .navbar-toggle span:nth-child(1) {
    top: 10px;
    transform: rotate(-45deg);
}

.onepage-menu.active ~ .navbar-toggle span:nth-child(2) {
    opacity: 0;
    left: -40px;
}

.onepage-menu.active ~ .navbar-toggle span:nth-child(3) {
    top: 10px;
    transform: rotate(45deg);
}

@media (min-width: 1201px) {
    .onepage-menu li a:after {
        content: '';
        position: absolute;
        bottom: 5px;
        left: 20px;
        right: 100%;
        height: 2px;
        background-color: #bd1e2d;
        transition: all .3s ease;
        opacity: 0;
    }

    .onepage-menu li a:hover:after {
        opacity: 1;
        right: 20px;
    }

    .onepage-menu li.current-menu-item a:after {
        opacity: 1;
        right: 20px;
    }

    .navbar-toggle {
        display: none;
    }
}

.navbar-toggle {
    position: absolute;
    right: 15px;
    top: 50%;
    width: 30px;
    height: 23px;
    overflow: hidden;
    transform: translateY(-50%);
    transition: .5s ease-in-out;
    cursor: pointer;
}

.navbar-toggle span {
    position: absolute;
    display: block;
    height: 3px;
    width: 100%;
    background-color: #bd1e2d;
    border-radius: 9px;
    opacity: 1;
    left: 0;
    transform: rotate(0deg);
    transition: .25s ease-in-out;
}

.navbar-toggle span:nth-child(1) {
    top: 0;
}

.navbar-toggle span:nth-child(2) {
    top: 10px;
}

.navbar-toggle span:nth-child(3) {
    top: 20px;
}

@media (min-width: 1201px) {
    .header {
        padding: 20px 0;
    }
}

@media (max-width: 1599px) {
    .onepage-nav .onepage-menu a {
        padding: 10px 10px;
    }
}

@media (max-width: 1199px) {
    .header__hotline_book_wrap {
        margin-right: 60px;
    }
}

@media (max-width: 991px) {
    .header__hotline_book_wrap {
        display: none;
    }
}

.header__lang {
    float: left;
    line-height: 60px;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
}

.header__lang > a {
    color: #fff;
}

.header__lang i {
    margin-left: 5px;
}

.header__hotline {
    float: left;
    text-align: right;
    color: #fff;
    margin-left: 60px;
}

.header__hotline span {
    display: block;
    font-size: 12px;
}

.header__hotline span i {
    margin-right: 5px;
}

.header__hotline a {
    color: #fff;
    font-size: 18px;
}

.header__booking {
    float: left;
    margin-left: 50px;
}

.header__lang_box {
    background: #fff;
    padding: 0;
    border-radius: 3px;
    position: absolute;
}

.header__lang_box li {
    line-height: 30px;
    padding: 5px 15px;
    border-bottom: 1px solid #ccc;
}

.header__lang_box li:hover {
    background-color: #eee;
}

.header__lang_box li a {
    color: #000;
    font-size: 12px;
}

.header__lang_box li img {
    margin-right: 5px;
}

/* 25. hero
--------------------------------------------------------------------------------*/

.hero {
    position: relative;
}

.hero__wrapper {
    position: relative;
}

.hero__item {
    position: relative;
    height: 100vh;
    display: block;
    background-size: cover;
}

.hero__item img {
    display: none;
}

.hero__thumbails {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    padding-left: 60px;
    overflow: initial;
}

.hero__thumbails .hero__item {
    height: 100%;
    cursor: pointer;
    border-radius: 50%;
    transition: all .5s ease-in-out;
    transform: scale(1);
}

.hero__thumbails .hero__item:hover {
    transform: scale(1.5);
}

.hero__thumbails .hero__item span {
    position: absolute;
    width: 100%;
    height: 100%;
    line-height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    right: -70px;
}

.hero__thumbails .swiper-wrapper {
    -ms-flex-direction: column;
        flex-direction: column;
    transform: initial !important;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
}

.hero__thumbails .swiper-slide {
    content: empty;
    height: 60px;
    width: 60px !important;
    margin-bottom: 20px;
}

.hero__thumbails .swiper-slide-active:before {
    content: "";
    position: absolute;
    width: 40px;
    height: 2px;
    background: #fff;
    top: 0;
    bottom: 0;
    margin: auto;
    left: -60px;
}

.hero__box_info {
    position: absolute;
    width: 100%;
    bottom: 0;
}

@media (min-width: 320px) {
    .hero__box_info {
        bottom: calc(18.75vw - 60px);
    }
}

@media (min-width: 1200px) {
    .hero__box_info {
        bottom: 165px;
    }
}

.hero__title {
    font-size: 20px;
    font-weight: 300;
    margin: 0;
    line-height: 1.25;
    margin-bottom: 20px;
    transition: all 1s ease-in-out;
    transform: translateY(100px) translateZ(0);
    opacity: 0;
}

@media (min-width: 320px) {
    .hero__title {
        font-size: calc(5.90909vw + 1.09091px);
    }
}

@media (min-width: 1200px) {
    .hero__title {
        font-size: 72px;
    }
}

.hero__info {
    font-size: 16px;
    margin-bottom: 0;
    transition: all 1s ease-in-out;
    transition-delay: .5s;
    transform: translateY(100px) translateZ(0);
    opacity: 0;
}

.hero__info span:after {
    content: "|";
    margin: 0 10px;
}

.hero__info span:last-child:after {
    content: "";
}

.hero__main_slider .hero__item:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, .4);
}

.hero__main_slider .swiper-slide-active:before {
    content: "";
    position: absolute;
    width: 40px;
    height: 2px;
    background: #fff;
    top: 0;
    bottom: 0;
    margin: auto;
    left: -60px;
}

.hero__main_slider .swiper-slide-active .hero__title {
    transform: translateY(0);
    opacity: 1;
}

.hero__main_slider .swiper-slide-active .hero__info {
    transform: translateY(0);
    opacity: 1;
}

@media (min-width: 1201px) {
    .hero__item {
        height: 100vh;
    }
}

@media (max-width: 1199px) {
    .hero__item {
        height: 400px;
    }
}

@media (max-width: 1199px) and (min-width: 320px) {
    .hero__item {
        height: calc(45.45455vw + 254.54545px);
    }
}

@media (max-width: 1199px) and (min-width: 1200px) {
    .hero__item {
        height: 800px;
    }
}

@media (max-width: 767px) {
    .hero__thumbails .swiper-slide {
        height: 30px;
        width: 30px !important;
    }

    .hero__thumbails .hero__item span {
        right: -40px;
    }
}

/* 26. Layout
--------------------------------------------------------------------------------*/

.main-content, .sidebar-left, .sidebar-right {
    margin-bottom: 40px;
}

.sidebar-left .form-item--button .select2-container--default .select2-selection--single .select2-selection__arrow,
.sidebar-right .form-item--button .select2-container--default .select2-selection--single .select2-selection__arrow {
    width: 25px;
    border-left: 0;
}

.sidebar-left .form-item--button .md-btn,
.sidebar-right .form-item--button .md-btn {
    padding-left: 20px;
    padding-right: 20px;
}

/* 27. Grid Boostrap
--------------------------------------------------------------------------------*/

.no-gutters {
    margin: 0;
}

.no-gutters > .col, .no-gutters > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
}

/* 28. Font size
--------------------------------------------------------------------------------*/

.f-subtitle {
    font-size: 22px;
    font-weight: 300;
}

.fz-16 {
    font-size: 16px;
}

.bg-gray {
    background-color: #f7f7f7;
}

/* 29. Margin Padding
--------------------------------------------------------------------------------*/

.mb-0 {
    margin-bottom: 0 !important;
}

.mt-0 {
    margin-top: 0 !important;
}

.pd-0 {
    padding: 0;
}

.mb-0 {
    margin-bottom: 0;
}

.mt-0 {
    margin-top: 0;
}

.mb-5 {
    margin-bottom: 5px;
}

.mt-5 {
    margin-top: 5px;
}

.mb-10 {
    margin-bottom: 10px;
}

.mt-10 {
    margin-top: 10px;
}

.mb-15 {
    margin-bottom: 15px;
}

.mt-15 {
    margin-top: 15px;
}

.mb-20 {
    margin-bottom: 20px;
}

.mt-20 {
    margin-top: 20px;
}

.mb-25 {
    margin-bottom: 25px;
}

.mt-25 {
    margin-top: 25px;
}

.mb-30 {
    margin-bottom: 30px;
}

.mt-30 {
    margin-top: 30px;
}

.mb-35 {
    margin-bottom: 35px;
}

.mt-35 {
    margin-top: 35px;
}

.mb-40 {
    margin-bottom: 40px;
}

.mt-40 {
    margin-top: 40px;
}

.mb-45 {
    margin-bottom: 45px;
}

.mt-45 {
    margin-top: 45px;
}

.mb-50 {
    margin-bottom: 50px;
}

.mt-50 {
    margin-top: 50px;
}

.mb-55 {
    margin-bottom: 55px;
}

.mt-55 {
    margin-top: 55px;
}

.mb-60 {
    margin-bottom: 60px;
}

.mt-60 {
    margin-top: 60px;
}

.mb-65 {
    margin-bottom: 65px;
}

.mt-65 {
    margin-top: 65px;
}

.mb-70 {
    margin-bottom: 70px;
}

.mt-70 {
    margin-top: 70px;
}

.mb-75 {
    margin-bottom: 75px;
}

.mt-75 {
    margin-top: 75px;
}

.pb-0 {
    padding-bottom: 0;
}

.pt-0 {
    padding-top: 0;
}

.pb-5 {
    padding-bottom: 5px;
}

.pt-5 {
    padding-top: 5px;
}

.pb-10 {
    padding-bottom: 10px;
}

.pt-10 {
    padding-top: 10px;
}

.pb-15 {
    padding-bottom: 15px;
}

.pt-15 {
    padding-top: 15px;
}

.pb-20 {
    padding-bottom: 20px;
}

.pt-20 {
    padding-top: 20px;
}

.pb-25 {
    padding-bottom: 25px;
}

.pt-25 {
    padding-top: 25px;
}

.pb-30 {
    padding-bottom: 30px;
}

.pt-30 {
    padding-top: 30px;
}

.pb-35 {
    padding-bottom: 35px;
}

.pt-35 {
    padding-top: 35px;
}

.pb-40 {
    padding-bottom: 40px;
}

.pt-40 {
    padding-top: 40px;
}

.pb-45 {
    padding-bottom: 45px;
}

.pt-45 {
    padding-top: 45px;
}

.pb-50 {
    padding-bottom: 50px;
}

.pt-50 {
    padding-top: 50px;
}

.pb-55 {
    padding-bottom: 55px;
}

.pt-55 {
    padding-top: 55px;
}

.pb-60 {
    padding-bottom: 60px;
}

.pt-60 {
    padding-top: 60px;
}

.pb-65 {
    padding-bottom: 65px;
}

.pt-65 {
    padding-top: 65px;
}

.pb-70 {
    padding-bottom: 70px;
}

.pt-70 {
    padding-top: 70px;
}

.pb-75 {
    padding-bottom: 75px;
}

.pt-75 {
    padding-top: 75px;
}

/* 30. Swiper
--------------------------------------------------------------------------------*/

.swiper-pagination-custom {
    margin-top: 20px;
    text-align: center;
}

.swiper-pagination-bullet {
    width: 10px;
    height: 10px;
    background-color: #bd1e2d;
    vertical-align: middle;
}

.swiper-container-horizontal > .swiper-pagination-bullets .swiper-pagination-bullet {
    margin: 5px;
}

/* 31. Popup
--------------------------------------------------------------------------------*/

.mfp-iframe-holder .mfp-close, .mfp-image-holder .mfp-close {
    width: 30px;
    height: 30px;
    line-height: 30px;
    border: 1px solid #fff;
    color: #fff;
    text-align: center;
    padding-right: 0;
    right: 0;
    opacity: 1;
}

.mfp-close:active {
    top: 0;
}

.mfp-iframe-holder .mfp-close:active {
    top: -40px;
}

.mfp-zoom-in .mfp-content {
    opacity: 0;
    transition: all .4s cubic-bezier(.18, .89, .32, 1.27);
    transform: scale(.8);
}

.mfp-zoom-in.mfp-bg {
    opacity: 0;
    transition: all .3s ease-out;
}

.mfp-zoom-in.mfp-ready .mfp-content {
    opacity: 1;
    transform: scale(1);
}

.mfp-zoom-in.mfp-ready.mfp-bg {
    opacity: .8;
}

.mfp-zoom-in.mfp-removing .mfp-content {
    transform: scale(.8);
    opacity: 0;
    transition: all .4s cubic-bezier(.18, .89, .32, 1.27);
}

.mfp-zoom-in.mfp-removing.mfp-bg {
    opacity: 0;
}

.grid_css_style_02 .filter {
    float: right;
    margin-top: -60px;
    z-index: 3;
    position: relative;
}

@media (max-width: 767px) {
    .grid_css_style_02 .filter {
        margin-top: -30px;
        float: left;
    }
}

.bg-fixed {
    background-attachment: fixed;
    background-size: cover;
    position: relative;
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .bg-fixed {
        padding-top: calc(5.68182vw + 31.81818px);
        padding-bottom: calc(5.68182vw + 31.81818px);
    }
}

@media (min-width: 1200px) {
    .bg-fixed {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}

.bg-fixed:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, .3);
    z-index: 1;
}

.bg-fixed.style-02 {
    padding-top: 50px;
    padding-bottom: 50px;
}

@media (min-width: 320px) {
    .bg-fixed.style-02 {
        padding-top: calc(15.34091vw + .90909px);
        padding-bottom: calc(15.34091vw + .90909px);
    }
}

@media (min-width: 1200px) {
    .bg-fixed.style-02 {
        padding-top: 185px;
        padding-bottom: 185px;
    }
}

.bg-fixed.style-03 {
    padding: 30px;
}

@media (min-width: 320px) {
    .bg-fixed.style-03 {
        padding: calc(7.95455vw + 4.54545px);
    }
}

@media (min-width: 1200px) {
    .bg-fixed.style-03 {
        padding: 100px;
    }
}

.sec-partner {
    border-top: 1px solid #e3e3e3;
    padding-top: 30px;
    padding-bottom: 30px;
    margin-top: 30px;
}

@media (min-width: 320px) {
    .sec-partner {
        padding-top: calc(4.54545vw + 15.45455px);
        padding-bottom: calc(4.54545vw + 15.45455px);
    }
}

@media (min-width: 1200px) {
    .sec-partner {
        padding-top: 70px;
        padding-bottom: 70px;
    }
}

@media (min-width: 320px) {
    .sec-partner {
        margin-top: calc(10.22727vw - 2.72727px);
    }
}

@media (min-width: 1200px) {
    .sec-partner {
        margin-top: 120px;
    }
}

.section-map .title__text {
    padding-right: 80px;
}

.cities-list {
    -webkit-column-count: 3;
    /* Chrome, Safari, Opera *//* Firefox */
            column-count: 3;
}

@media (max-width: 991px) {
    .cities-list {
        -webkit-column-count: 2;
        /* Chrome, Safari, Opera *//* Firefox */
                column-count: 2;
    }
}

.col-cities {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: center;
    justify-content: center;
}

.swiper-container--style1 .swiper-button-custom {
    display: none;
}

.swiper-button-custom.style-02 {
    position: absolute;
    z-index: 9;
    left: 0;
    right: 30px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    z-index: -1;
}

.swiper-button-custom.style-02 > div {
    box-shadow: 0 10px 30px 0 rgba(0, 0, 0, .1);
    width: 50px;
    height: 50px;
    line-height: 50px;
    text-align: center;
    border-radius: 50%;
    cursor: pointer;
}

.swiper-button-custom.style-02 > div:hover {
    background-color: rgba(0, 0, 0, .1);
}

.swiper-button-custom.style-02 .swiper-button-prev-custom {
    position: absolute;
    left: -100px;
}

.swiper-button-custom.style-02 .swiper-button-next-custom {
    position: absolute;
    right: -100px;
}
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color:orange">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/logo_medium_3-removebg-preview.png" alt="Archer's Tours Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/destination">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Content-->
<div class="md-content">

				<!-- page-title -->
				<div class="page-title" style="background-image:url(/images/maasai-mara-8.jpg);height:600px">
					<div class="page-title__titlewrap">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">


								</div>
							</div>
						</div>
					</div>
				</div><!-- End / page-title -->


				<!-- box-share -->
				<div class="box-share">
					<div class="box-share__socialicon_wrap">

						<!-- social-icon -->
						<a class="social-icon" href="#"><i class="fa fa-facebook"></i>
						</a><!-- End / social-icon -->


						<!-- social-icon -->
						<a class="social-icon" href="#"><i class="fa fa-twitter"></i>
						</a><!-- End / social-icon -->


						<!-- social-icon -->
						<a class="social-icon" href="#"><i class="fa fa-flickr"></i>
						</a><!-- End / social-icon -->


						<!-- social-icon -->
						<a class="social-icon" href="#"><i class="fa fa-instagram"></i>
						</a><!-- End / social-icon -->

					</div>
				</div><!-- End / box-share -->





				<!-- Section -->
				<section class="awe-section section-map">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-6 ">

								<!-- title -->
								<div class="title title__style-02">
									<h2 class="title__title">Explore Our Cambodia</h2>
									<p class="title__text">Cambodia's geography has played a substantial role in shaping its history. Its central location along the Indochinese Peninsula and relatively flat terrain facilitated the rise of the Khmer Empire which flourished from its base in Angkor for over 500 years. Conversely, Cambodia's proximity to the chaos of the Vietnam War sowed seeds of catastrophe that the country is now recovering from. Both of these periods are inextricable to the identity of both Cambodia, and its people</p>
								</div><!-- End / title -->

							</div>
							<div class="col-md-6 col-lg-6 ">
								<div id="map"></div>
							</div>
						</div>
					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section">
					<div class="container">

						<!-- title -->
						<div class="title">
							<h2 class="title__title">Cambodia Tour</h2>
							<p class="title__text">From scavenger hunts around Angkor to cruises along the Mekong at sunset and exclusive cultural encounters</p>
						</div><!-- End / title -->

						<div class="grid-css grid_css_style_02 grid-css--masonry" data-col-lg="3" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
							<div class="grid__inner">
								<div class="grid-sizer"></div>
								<div class="grid-item cat1">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('/images/slider-1.jpg');"><img src="/images/slider-1.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Hanoi</p>
														<p class="box-image2__tour">Thailand Wellness & Luxury Spa</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
								<div class="grid-item cat2">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('assets/img/image_box_2/2.jpg');"><img src="assets/img/image_box_2/2.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Singapore</p>
														<p class="box-image2__tour">The Silk Road</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
								<div class="grid-item cat1">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('assets/img/image_box_2/3.jpg');"><img src="assets/img/image_box_2/3.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Delhi</p>
														<p class="box-image2__tour">Classic Vietnam from Ho Chi Minh City</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
								<div class="grid-item cat2">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('assets/img/image_box_2/4.jpg');"><img src="assets/img/image_box_2/4.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Delhi</p>
														<p class="box-image2__tour">The Silk Road</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
								<div class="grid-item cat1">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('assets/img/image_box_2/5.jpg');"><img src="assets/img/image_box_2/5.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Maldives</p>
														<p class="box-image2__tour">The Mighty Brahmaputra River</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
								<div class="grid-item cat2">
									<div class="grid-item__inner">
										<div class="grid-item__content-wrapper">

											<!-- box-image2 -->
											<div class="box-image2">
												<div><a class="box-image2__bg" href="#" style="background-image: url('assets/img/image_box_2/6.jpg');"><img src="assets/img/image_box_2/6.jpg" alt=""/></a>
													<div class="box-image2__info">
														<p class="box-image2__country">Phnom Penh</p>
														<p class="box-image2__tour">Discover Hong Kong and Bangkok incl. Airfare</p>
													</div>
													<div class="box-image2__info_bot"><span class="box-image2__date">7 Days / 8 Nights</span><a class="box-image2__view" href="#">View tour</a></div>
												</div>
											</div><!-- End / box-image2 -->

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="text-center">
							<a class="md-btn mt-60 md-btn--primary md-btn--pill " href="#">Explore more
							</a>
						</div>
					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section bg-gray cities">
					<div class="container">

						<!-- title -->
						<div class="title title__style-03">
							<h2 class="title__title">Cities Of Cambodia</h2>
							<p class="title__text">Whether it's a sublime beachside resort, remote boutique getaway or anything in between, we've found the very best accommodation</p>
						</div><!-- End / title -->

						<div class="row row-eq-height">
							<div class="col-md-9 col-lg-9 ">
								<div class="cities-list">

									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Botswana</a></h5>
										<p class="widget_text__tour">635 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Finland</a></h5>
										<p class="widget_text__tour">339 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Tunisia</a></h5>
										<p class="widget_text__tour">782 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Tunisia</a></h5>
										<p class="widget_text__tour">185 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Azerbaijan</a></h5>
										<p class="widget_text__tour">797 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Turkey</a></h5>
										<p class="widget_text__tour">480 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Albania</a></h5>
										<p class="widget_text__tour">394 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Qatar</a></h5>
										<p class="widget_text__tour">257 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Brazil</a></h5>
										<p class="widget_text__tour">508 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Philippines</a></h5>
										<p class="widget_text__tour">764 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Malaysia</a></h5>
										<p class="widget_text__tour">537 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Zimbabwe</a></h5>
										<p class="widget_text__tour">729 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Iraq</a></h5>
										<p class="widget_text__tour">324 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Hungary</a></h5>
										<p class="widget_text__tour">464 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Puerto Rico</a></h5>
										<p class="widget_text__tour">186 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Morocco</a></h5>
										<p class="widget_text__tour">491 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">Falkland Islands</a></h5>
										<p class="widget_text__tour">660 Tour</p>
									</div><!-- End / widget_text -->


									<!-- widget_text -->
									<div class="widget_text">
										<h5 class="widget_text__title"><a href="#">South Korea</a></h5>
										<p class="widget_text__tour">389 Tour</p>
									</div><!-- End / widget_text -->

								</div>
							</div>
							<div class="col-md-3 col-lg-3  col-cities">

								<!-- title -->
								<div class="title title__style-04 awe-skin-dark awe-text-center bg-fixed" style="background-image:url(http://kenhdulich.org/container/2015/content/articles/10/lac-buoc-dam-chuon-buoi-hoang-hon/lac-buoc-dam-chuon-buoi-hoang-hon-7.jpg);">
									<h2 class="title__title">(+84) 43 252 333</h2>
									<p class="title__text">Call us immediately for a direct consultation</p>
								</div><!-- End / title -->

							</div>
						</div>
					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section awe-skin-dark bg-fixed style-02" style="background-image:url(assets/img/bg/2.jpg);">
					<div class="container">

						<!-- title -->
						<div class="title title__style-03">
							<h5 class="title__title_small">Ready to go?</h5>
							<h2 class="title__title">Travel Guides Cambodia</h2>
							<p class="title__text">Cambodia's geography has played a substantial role in shaping its history. Its central location along the Indochinese Peninsula and relatively flat terrain facilitated the rise of the Khmer Empire which flourished from its base in Angkor for over 500 years</p>
						</div><!-- End / title -->

						<a class="md-btn mt-20 md-btn--primary md-btn--pill " href="#">Read more
						</a>
					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section">
					<div class="container">

						<!-- title -->
						<div class="title">
							<h2 class="title__title">Other Country In Asia</h2>
							<p class="title__text">Whether it's a sublime beachside resort, remote boutique getaway or anything in between, we've found the very best accommodation</p>
						</div><!-- End / title -->

						<div class="row">
							<div class="col-md-12 col-lg-12 ">
								<div class="grid-css grid-css--masonry" data-col-lg="4" data-col-md="3" data-col-sm="2" data-col-xs="1" data-gap="30">
									<div class="grid__inner">
										<div class="grid-sizer"></div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/1.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/1.jpg" style="background-image: url('assets/img/image_box_1/1.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/1.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Istanbul</h4>
																	<p class="box-image__tour">264</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/2.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/2.jpg" style="background-image: url('assets/img/image_box_1/2.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/2.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Siem Reap</h4>
																	<p class="box-image__tour">314</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/3.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/3.jpg" style="background-image: url('assets/img/image_box_1/3.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/3.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Nara</h4>
																	<p class="box-image__tour">269</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/4.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/4.jpg" style="background-image: url('assets/img/image_box_1/4.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/4.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Ko Samui</h4>
																	<p class="box-image__tour">355</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/5.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/5.jpg" style="background-image: url('assets/img/image_box_1/5.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/5.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Bangkok</h4>
																	<p class="box-image__tour">163</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/6.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/6.jpg" style="background-image: url('assets/img/image_box_1/6.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/6.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Agra</h4>
																	<p class="box-image__tour">343</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/7.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/7.jpg" style="background-image: url('assets/img/image_box_1/7.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/7.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Osaka</h4>
																	<p class="box-image__tour">374</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
										<div class="grid-item">
											<div class="grid-item__inner">
												<div class="grid-item__content-wrapper">

													<!-- box-image -->
													<div class="box-image" href="assets/img/image_box_1/8.jpg">
														<div><a class="box-image__bg" href="assets/img/image_box_1/8.jpg" style="background-image: url('assets/img/image_box_1/8.jpg');" data-effect="mfp-zoom-in"><img src="assets/img/image_box_1/8.jpg" alt=""/>
																<div class="box-image__info">
																	<h4 class="box-image__country">Kyoto</h4>
																	<p class="box-image__tour">353</p>
																</div></a></div>
													</div><!-- End / box-image -->

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section bg-gray">
					<div class="container">

						<!-- title -->
						<div class="title title__style-02">
							<h2 class="title__title">Special Expert</h2>
						</div><!-- End / title -->

						<div class="row">
							<div class="col-md-3 col-lg-3 ">

								<!-- expert -->
								<div class="expert expert__style-02">
									<div class="expert__avatar"><img src="https://uinames.com/api/photos/female/11.jpg"/></div>
									<div class="expert__body">
										<h6 class="expert__name">Ann Fowler</h6><span class="expert__work">CEO & Founder</span>
									</div>
								</div><!-- End / expert -->

							</div>
							<div class="col-md-3 col-lg-3 ">

								<!-- expert -->
								<div class="expert expert__style-02">
									<div class="expert__avatar"><img src="https://uinames.com/api/photos/male/1.jpg"/></div>
									<div class="expert__body">
										<h6 class="expert__name">Alan Lane</h6><span class="expert__work">CEO & Founder</span>
									</div>
								</div><!-- End / expert -->

							</div>
							<div class="col-md-3 col-lg-3 ">

								<!-- expert -->
								<div class="expert expert__style-02">
									<div class="expert__avatar"><img src="https://uinames.com/api/photos/male/17.jpg"/></div>
									<div class="expert__body">
										<h6 class="expert__name">Brandon Hanson</h6><span class="expert__work">Programs Assistant</span>
									</div>
								</div><!-- End / expert -->

							</div>
							<div class="col-md-3 col-lg-3 ">

								<!-- expert -->
								<div class="expert expert__style-02">
									<div class="expert__avatar"><img src="https://uinames.com/api/photos/male/10.jpg"/></div>
									<div class="expert__body">
										<h6 class="expert__name">Bruce Powell</h6><span class="expert__work">CEO & Founder</span>
									</div>
								</div><!-- End / expert -->

							</div>
						</div>
					</div>
				</section>
				<!-- End / Section -->

			</div>



            <script src="{{ asset('assets/vendors/mapdata/mapdata.js') }}"></script>
    <script src="{{ asset('assets/vendors/mapdata/countrymap.js') }}"></script>
    <script src="{{ asset('assets/vendors/_jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('assets/vendors/isotope-layout/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-one-page/jquery.nav.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/masonry-layout/masonry.pkgd.js') }}"></script>
    <script src="{{ asset('assets/vendors/swiper/swiper.jquery.js') }}"></script>
    <script src="{{ asset('assets/vendors/menu/menu.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery.select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendors/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Your App-specific JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


<!-- Scripts -->
<script src="{{ asset('Template/js/jquery.min.js') }}"></script>
<script src="{{ asset('Template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Template/js/main.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
