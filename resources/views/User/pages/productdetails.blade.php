<!doctype html>
@include('User.include.header')
<!--- product details for singel---->



<div class="container" id="product" style="margin-top: 100px">
    <div class="row">

        <div class="col-lg-6" id="productimage">
            <img class="img-fluid" src="User/images/top1.jpg">
        </div>
        <div class="col-lg-6" id="productinfo">
            <h1>Topwear kurti</h1>
            <h3>Price: 250$</h3>
            <h3>Select size</h3>
            <select>
                <option>small</option>
                <option>medium</option>
                <option>large</option>
            </select>
            <br>
            <button class="btn" ><i class="fa fa-plus"></i></button>
            
            <button class="btn" ><i class="fa fa-plus"></i></button>
            <br>
            <a href="#" class="btn">Add to CArt</a>
            <a href="#" class="btn">Add to Wishlist</a>
            <p>Product Details</p>
            <p>Make an elegant addition to your formal ethnic closet with this turquoise kurta from Janasya. Constructed in a straight silhouette from a cotton material, this floral kurta flaunts exquisite button detailing on the bodice for added charm and is completed with a pair of off-white cotton flex pants.</p>


        </div>


    </div>
</div>
<div class="container" style="margin-top: 100px">
    <div class="row">
       <div class="col-12">
        <div class="top-mw-txt text-center">
            <h3>Related Products</h3>
        </div>
       </div>
    </div>
</div>


@include('User.include.footer')