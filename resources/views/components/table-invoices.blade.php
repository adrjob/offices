<div class="table-responsive">
    <table class="table table-flush" id="example">
        <thead class="thead-light">
            <tr>
                <!-- <th>Id</th>                                     -->
                <th>Description/Notes</th>    
                @if($dd  == 'Dubai')
                <th>Dirham/AED</th>                                
                @elseif($dd == 'Istanbul')
                <th>Turkish Lira/TL</th>                                
                @else
                <th>Vatu/VUV</th>                                
                @endif                
                <!-- <th>USD</th> -->
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <!-- <th></th>                                     -->
                <th></th>    
                <!-- <th></th>     -->
                <th>Total</th>                                
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>