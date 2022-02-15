<?php
function card($gambar, $judul, $harga)
{
    return `
        <div class="card" style="width: 18rem;">
            <img src="./assets/$gambar" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">$judul</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <p class="card-text">$harga</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>`;
}
