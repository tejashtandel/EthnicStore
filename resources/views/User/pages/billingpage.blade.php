<!DOCTYPE html>
@include('User.include.header')


<div class="container bill">
    <div class="print" id="invoice">
        <div class="row" id="bill">
            <div class="col-lg-12 col-sm-12 col-md-12 col-12">
                <div class="header">

                    <h2><img src="{{ asset('User/images/logo2.png') }}" class="center" alt="">Billing Page</h2>

                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6 col-md-6 userdetails" id="user">
                @foreach ($user as $us)
                    <ul>

                        <li>
                            <h4>User name: <span>{{ $us->firstname }}</span> <span>{{ $us->lastname }}</span>
                            </h4>
                        </li>
                        <li>
                            <h4>Address Of User: <span>{{ $us->house }}</span> , <span>{{ $us->street }}</span> ,
                                <span>{{ $us->landmark }}</span> , <span>{{ $us->city }}</span> ,
                                <span>{{ $us->state }}</span>
                            </h4>
                        </li>
                        <li>
                            <h4>User Email: <span>{{ $us->email }}</span></h4>
                        </li>
                        <li>
                            <h4>User Contactno: <span>{{ $us->mobile_no }}</span></h4>
                        </li>

                    </ul>
                @endforeach

            </div>


            <div class=" col-lg-6 col-md-6 companydetails" id="company">
                <ul>
                    @foreach ($footer as $foot)
                        <li>
                            <h4><span> Ethics Beauty</span></h4>
                        </li>
                        <li>
                            <h4> <span> {{ $foot->address }}</span></h4>
                        </li>
                        <li>
                            <h4> <span> {{ $foot->email }}</span></h4>
                        </li>
                        <li>
                            <h4> <span> {{ $foot->phone }}</span></h4>
                        </li>
                    @endforeach

                </ul>
            </div>


        </div>

        <div class="billdetails" id="printorder">
            <center>
                <table class="table table-border tb" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>

                        </tr>
                    </thead>

                    @foreach ($items as $it)
                        <tbody>
                            <td>{{ $it->pname }}</td>
                            <td>{{ $it->pc }} ₹</td>
                            <td>{{ $it->qp }}</td>

                        </tbody>
                    @endforeach



                    @foreach ($bill as $it)
                        <tr>
                            <td>Total Cost:</td>
                            <td><span id="totalsum" class="totalsum">{{ $it->grandtotal }} ₹</span></td>
                            <td></td>

                        </tr>
                    @endforeach
                </table>


            </center>
        </div>
    </div>
    <div class="print22">
        <button id="print" class="printbutton flex"><i class="fa-solid fa-print"></i> Print Bill</button>

        <form action="{{ route('bill.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />


            <button type="submit" id="printorder" class="donebutton" style="align-content: center"><i
                    class="fa-solid fa-square-check"></i> Done</button>

        </form>
    </div>



</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>



<script>
    window.onload = function() {
        document.getElementById("print")
            .addEventListener("click", () => {
                const invoice = this.document.getElementById("invoice");
                var opt = {
                    margin: 1,
                    filename: 'Bill.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'letter',
                        orientation: 'portrait'
                    }
                };
                html2pdf().from(invoice).set(opt).save();
            })
    }
</script>

@include('User.include.footer')
