<div class="row">
    <div class="col-md-8 offset-md-2 mt-5">
        <h2 class="text-center">
            Test APIs
        </h2>
        <div class="text-center my-3">
            <img src="/assets/img/symbol.png" style="width: 100px;" alt="">
        </div>
        <div class="my-3">
            <label>Resource</label>
            <select class="form-control" name="resource" id="test_resource">
                <option value="{{\URL::to('/')}}/api/v1/addresses">Addresses</option>
                <option value="{{\URL::to('/')}}/api/v1/books">Books</option>
                <option value="{{\URL::to('/')}}/api/v1/companies">Companies</option>
                <option value="{{\URL::to('/')}}/api/v1/credit_cards">Credit Cards</option>
                <option value="{{\URL::to('/')}}/api/v1/images">Images</option>
                <option value="{{\URL::to('/')}}/api/v1/persons">Persons</option>
                <option value="{{\URL::to('/')}}/api/v1/places">Places</option>
                <option value="{{\URL::to('/')}}/api/v1/products">Products</option>
                <option value="{{\URL::to('/')}}/api/v1/texts">Texts</option>
                <option value="{{\URL::to('/')}}/api/v1/users">Users</option>
                <option value="{{\URL::to('/')}}/api/v1/custom">Custom</option>
            </select>
        </div>
        <div class="my-3">
            <label>Quantity</label>
            <input type="number" min="1" max="500" class="form-control" id="test_quantity" value="1">
        </div>
        <div class="my-3">
            <label>URL (additional parameters here)</label>
            <input type="text" class="form-control" id="test_url" value="">
        </div>
        <div class="my-3 text-center">
            <button type="button" class="refresh-request btn btn-gradient" onclick="getRequest($('#test_url').val(), 'test_response')"><svg class="i-lightning" viewBox="0 0 32 32" width="24" height="24" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M18 13 L26 2 8 13 14 19 6 30 24 19 Z"></path>
            </svg> Send Test Request</button>
        </div>
    </div>
    <div class="col-12">
        <div id="test_response" class="my-3">
            <pre><code class="json">Test Response.</code></pre>
        </div>
    </div>
</div>
