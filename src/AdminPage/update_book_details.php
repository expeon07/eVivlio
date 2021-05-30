<form action="../src/AdminPage/update_book_post.php" method="POST" id="update-book-form" 
    enctype="multipart/form-data">
    <div class="form-group row">
        <label for="isbn" class="col-sm-3 col-form-label updatebook-label">ISBN</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-isbn" name="isbn" 
            placeholder="ISBN" readonly>
        </div>
    </div>

    <div class="form-group row">
        <label for="title" class="col-sm-3 col-form-label updatebook-label">Book Title</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-title" name="title" 
            placeholder="Title" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="cover" class="col-sm-3 col-form-label updatebook-label">Book Cover</label>
        <div class="col-sm-9">
        <img class="" id="update-cover" src="" width="100px" alt="book cover"> <br>
        Choose new cover: <input type="file" name="cover" id="cover">
        </div>
    </div>

    <div class="form-group row">
        <label for="author" class="col-sm-3 col-form-label updatebook-label">Author</label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" id="update-author1-firstname" name="author_firstname" 
                        placeholder="First Name" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" id="update-author1-lastname" name="author_lastname" 
                        placeholder="Last Name" required>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="publisher" class="col-sm-3 col-form-label updatebook-label">Publisher</label>
        <div class="col-sm-9">
        <input type="text" class="form-control" id="update-publisher" name="publisher" 
            placeholder="Publisher" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="year" class="col-sm-3 col-form-label updatebook-label">Publishing Year</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-year" name="year" 
            placeholder="Publishing Year" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="category" class="col-sm-3 col-form-label updatebook-label">Category</label>
        <div class="col-sm-9 form-check">
            <div class="row">
                <div class="col">
                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Business" id="business">
                    <label class="form-check-label" for="business">Business</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Children Collection" id="childrens">
                    <label class="form-check-label" for="childrens">Children's Collection</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="History" id="history"> 
                    <label class="form-check-label" for="history">History</label><br>                    

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Literature" id="literature">
                    <label class="form-check-label" for="literature">Literature</label><br>                
                </div>
                <div class="col">
                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Novels" id="novels">
                    <label class="form-check-label" for="novels">Novels</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]"
                        value="Science Fiction" id="scifi">
                    <label class="form-check-label" for="scifi">Science Fiction</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Science and Technology" id="scitech">
                    <label class="form-check-label" for="scitech">Science & Technology</label><br>

                    <input class="form-check-input update-category" type="checkbox" name="category[]" 
                        value="Philosophy" id="philo">
                    <label class="form-check-label" for="philo">Philosophy</label><br>                                    
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label for="pages" class="col-sm-3 col-form-label updatebook-label">Number of Pages</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-pages" name="pages" 
            placeholder="Number of Pages" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="summary" class="col-sm-3 col-form-label updatebook-label">Summary</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="update-summary" name="summary" rows="5" required></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label for="price" class="col-sm-3 col-form-label updatebook-label">Price</label>
        <div class="col-sm-9 input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">€</span>
            </div>
            <input type="number" step="0.01" class="form-control" id="update-price" name="price" 
                placeholder="Price" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="stocks" class="col-sm-3 col-form-label updatebook-label">Stocks Available</label>
        <div class="col-sm-9">
        <input type="number" class="form-control" id="update-stocks" name="stocks" 
            placeholder="10" required>
        </div>
    </div>

    <div class="form-group row">
        <label for="feature" class="col-sm-3 col-form-label updatebook-label">Feature</label>
        <div class="col-sm-9 form-check">
            <input class="form-check-input update-features" type="checkbox" name="feature[]" 
                value="best_seller" id="best-seller"> 
            <label class="form-check-label" for="best-seller">Best Seller of the Month</label><br>

            <input class="form-check-input update-features" type="checkbox" name="feature[]" 
                value="editors_pick" id="editors-pick"> 
            <label class="form-check-label" for="editors-pick">Editor's Pick</label><br>

            <input class="form-check-input update-features" type="checkbox" name="feature[]" 
                value="new_release" id="new-release"> 
            <label class="form-check-label" for="new-release">New Release</label><br>
        </div>
    </div>
    
    <div class="text-center">
        <button class="btn blue-theme-btn" type="submit" name="update-book-btn"
            id="update-book-btn">Update Book Details</button>                                 
    </div>
</form>
