@push('style_content')
<style>
/* body {
    background: #e8e8e8;
}

.form-area {
    padding-top: 7%;
} */

.row.single-form {
    box-shadow: 0 2px 20px -5px rgba(0, 0, 0, 0.5);
}

.left {
    background: blueviolet;
    padding: 200px 98px;
}

.left h2 {
    font-family: poppins;
    color: #fff;
    font-weight: 700;
    font-size: 48px;
}

.left h2 span {
    font-weight: 100;
}

.single-form {
    background: #fff;
}

.right {
    padding: 70px 100px;
    position: relative;
}

.right i {
    position: absolute;
    font-size: 80px;
    left: -27px;
    top: 40%;
    color: #fff;
}

.form-control {
    border: 2px solid #000;
}

.right button {
    border: none;
    border-radius: 0;
    background: #252525;
    width: 180px;
    color: #fff;
    padding: 15px 0;
    display: inline-block;
    font-size: 16px;
    margin-top: 20px;
    cursor: pointer;
}

.right button:hover {
    background-color: #252525;
}


/*responsive*/

@media (min-width:768px) and (max-width:991px) {
    .right i {
        top: -52px;
        transform: rotate(90deg);
        left: 50%;
    }
}

@media (max-width:767px) {
    .left {
        padding: 90px 15px;
        text-align: center;
    }

    .left h2 {
        font-size: 25px;
    }

    .right {
        padding: 25px;
    }

    .right i {
        top: -52px;
        transform: rotate(90deg);
        left: 46%;
    }

    .right button {
        width: 150px;
        padding: 12px 0;
    }

}
</style>
@endpush



