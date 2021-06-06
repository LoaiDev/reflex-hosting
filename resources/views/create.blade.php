<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ram</title>
</head>
<body>
<nav class="navbar">
    <div class="navbar__container">
        <a href="#" id="navbar__logo">Reflex Hosting - Billing</a>
    </div>
</nav>
<div class="services">
    <h1>Configure Your Server!</h1>
    <div class="services__wrapper">
        <div class="services__card">
            <h2>1gb ram</h2>
            <p>Perfect to play with a couple friends!</p>
            <div class="services__btn">
                <li>
                    <label for='1'><button><a href="{{route('plan.show', ['plan' => 1])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>2gb Server</h2>
            <p>Perfect to have 10 players online</p>
            <div class="services__btn">
                <li>
                    <label for='2'><button><a href="{{route('plan.show', ['plan' => 2])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>3gb Server</h2>
            <p>Can easily handle 15 players</p>
            <div class="services__btn">
                <li>
                    <label for='3'><button><a href="{{route('plan.show', ['plan' => 3])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>4gb Server</h2>
            <p>Can hande 20 to 25 players and all plugins</p>
            <div class="services__btn">
                <li>
                    <label for='4'><button><a href="{{route('plan.show', ['plan' => 4])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>5gb Server</h2>
            <p>Can handle 30 players and all plugins</p>
            <div class="services__btn">
                <li>
                    <label for='5'><button><a href="{{route('plan.show', ['plan' => 5])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>6gb Server</h2>
            <p>can handle 40 players and all plugins</p>
            <div class="services__btn">
                <li>
                    <label for='6'><button><a href="{{route('plan.show', ['plan' => 6])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>7gb Server</h2>
            <p>Can handle 40 players online and all modpacks and plugins</p>
            <div class="services__btn">
                <li>
                    <label for='7'><button><a href="{{route('plan.show', ['plan' => 7])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>8gb server</h2>
            <p>Can handle 45 players online and all modpacks and plugins</p>
            <div class="services__btn">
                <li>
                    <label for='8'><button><a href="{{route('plan.show', ['plan' => 8])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
        <div class="services__card">
            <h2>9gb Server</h2>
            <p>Can handle 50 players online and all modpacks and plugins</p>
            <div class="services__btn">
                <li>
                    <label for='9'><button><a href="{{route('plan.show', ['plan' => 9])}}">Configure</a></button> </label>
                </li>
            </div>
        </div>
    </div>
</div>

<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        scroll-behavior: smooth;
    }

    .navbar {
        background: #131313;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.2rem;
        position: sticky;
        top: 0;
        z-index: 999;
    }

    .navbar__container {
        display: flex;
        justify-content: space-between;
        height: 80px;
        z-index: 1;
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 50px;
    }

    #navbar__logo {
        color: #fff;
        display: flex;
        align-items: center;
        cursor: pointer;
        text-decoration: none;
        font-size: 1.5rem;
    }


    .services {
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding: 10rem 0;
    }

    .services h1 {
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        -webkit-background-clip: text;
        -moz-background-clip: text;
        -webkit-text-fill-color: transparent;
        -moz-text-fill-color: transparent;
        margin-bottom: 5rem;
        font-size: 2.5rem;
    }

    .services__wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 1fr;
    }

    .services__card {
        margin: 10px;
        height: 425px;
        width: 300px;
        border-radius: 4px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        color: #fff;
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        transition: 0.3s ease-in;
    }

    .services__card:nth-child(2) {
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    .services__card:nth-child(3) {
        background: #2193b0;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #6dd5ed, #2193b0);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #6dd5ed, #2193b0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    }

    .services__card h2 {
        text-align: center;
    }

    .services__card p {
        text-align: center;
        margin-top: 24px;
        font-size: 20px;
    }

    .services__btn {
        display: flex;
        justify-content: center;
        margin-top: 16px;
    }

    .services__card button {
        color: #fff;
        padding: 14px 24px;
        border: none;
        outline: none;
        border-radius: 4px;
        background: #131313;
        font-size: 1rem;
    }

    .services__card:hover {

    }

    .services__card:hover {
        transform: scale(1.075);
        transition: 0.3 ease-in;
    }

    @media screen and (max-width: 1300px) {
        .services__wrapper {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media screen and (max-width: 768px) {
        .services__wrapper {
            grid-template-columns: 1fr;
        }
    }

    a {
        text-decoration: none;
        color: #fff;
    }






    ul {
        list-style: none;
    }
    li {
        display: inline-block;
        margin-right: 15px;
    }
    input {
        visibility:hidden;
    }
    label {
        cursor: pointer;
    }
    input:checked + label {
        background: red;
    }
</style>


<script src="//code.tidio.co/1v4w0tkpovrfmmb2xqfngqx3yvztwsls.js" async></script>

</body>
</html>
