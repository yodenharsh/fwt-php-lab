<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                Asia tour
            </div>
            <div class="list-group list-group-flush">
                <li class="list-group-item">India</li>
                <li class="list-group-item">Japan</li>
                <li class="list-group-item">China</li>
            </div>
            <div class="card-footer">
                USD 1400
            </div>
            <div class="text-center">
                <label class="form-check-label" for="asia">
                    Select :
                </label>
                <input class="form-check-input" type="radio" name="country" id="asia" value="asia">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                Europe tour
            </div>
            <div class="list-group list-group-flush">
                <li class="list-group-item">United Kingdoms</li>
                <li class="list-group-item">Germany</li>
                <li class="list-group-item">Sweden</li>
            </div>
            <div class="card-footer">
                USD 11000
            </div>
            <div class="text-center">
                <label class="form-check-label" for="europe">
                    Select :
                </label>
                <input class="form-check-input" type="radio" name="country" id="europe" value="europe">
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                North America tour
            </div>
            <div class="list-group list-group-flush">
                <li class="list-group-item">USA</li>
                <li class="list-group-item">Canada</li>
                <li class="list-group-item">USA</li>
            </div>
            <div class="card-footer">
                USD 25000
            </div>
            <div class="text-center">
                <label class="form-check-label" for="na">
                    Select :
                </label>
                <input class="form-check-input" type="radio" name="country" id="na" value="na">
            </div>
        </div>
    </div>
</div>
<div class="mb-3 mt-3 w-25 text-center">
    <label for="year" class="form-label">Preferred year:</label>
    <input type="number" class="form-control" id="year" placeholder="Year" name="year">
</div>
<div class="mb-3 w-25 text-center">
    <label for="people" class="form-label">Number of people:</label>
    <input type="number" class="form-control" id="people" placeholder="People" name="people">
</div>
<div class="container text-center mb-4">
    <div class="text-center">
        Agree to terms and conditions?
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="terms" id="terms-yes" value="yes">
        <label class="form-check-label" for="terms-yes">Yes</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="terms" id="terms-no" value="no">
        <label class="form-check-label" for="terms-no">No</label>
    </div>
    <div class="error-box">Need to accept terms</div>
</div>
<div class="text-center">
    <button type="submit" class="btn btn-success" id="submit-btn">Book the Trip!</button>
</div>