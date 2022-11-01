<style>

/* body {
    background-color: #b064f7;
    line-height: 1rem;
    font-size: 14px;
    padding: 10px
}

.container {
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;
    border-bottom-left-radius: 25px;
    border-bottom-right-radius: 25px;
    background-color: #eee
} */
.card {
    position: relative;
    background: #fff;
    box-shadow: 0 0 15px rgba(0, 0, 0, .1)
}

small {
    font-size: 12px
}

.cart {
    line-height: 1
}


.pic {
    width: 70px;
    height: 90px;
    border-radius: 5px
}

td {
    vertical-align: middle
}

.red {
    color: #fd1c1c;
    font-weight: 600
}

.b-bottom {
    border-bottom: 2px dotted black;
    padding-bottom: 20px
}

p {
    margin: 0px
}

table input {
    width: 40px;
    border: 1px solid #eee
}

input:focus {
    border: 1px solid #eee;
    outline: none
}

.round {
    background-color: #eee;
    height: 40px;
    width: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center
}

.payment-summary .unregistered {
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #eee;
    text-transform: uppercase;
    font-size: 14px
}

.payment-summary input {
    width: 100%;
    margin-right: 20px
}

.payment-summary .sale {
    width: 100%;
    background-color: #e9b3b3;
    text-transform: uppercase;
    font-size: 12px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5PX 0
}

.red {
    color: #fd1c1c
}

.del {
    width: 35px;
    height: 35px;
    object-fit: cover
}

.delivery .card {
    padding: 10px 5px
}

.option {
    position: relative;
    top: 50%;
    display: block;
    cursor: pointer;
    color: #888
}

.option input {
    display: none
}

.checkmark {
    position: absolute;
    top: 40%;
    left: -25px;
    height: 20px;
    width: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%
}

.option input:checked~.checkmark:after {
    display: block
}

.option .checkmark:after {
    content: "\2713";
    width: 10px;
    height: 10px;
    display: block;
    position: absolute;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    transition: 200ms ease-in-out 0s
}

.option:hover input[type="radio"]~.checkmark {
    background-color: #f4f4f4
}

.option input[type="radio"]:checked~.checkmark {
    background: #ac1f32;
    color: #fff;
    transition: 300ms ease-in-out 0s
}

.option input[type="radio"]:checked~.checkmark:after {
    transform: translate(-50%, -50%) scale(1);
    color: #fff
}
</style>