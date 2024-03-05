<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./style/style.css">
<title>Add a Post</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
    }
    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
        color: #34CC33;
    }
    table {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 20px;
    table-layout: fixed;
}

    label {
        font-weight: bold;
    }
    .file-input-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
    }
    .file-input-wrapper input[type="file"] {
        font-size: 100px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }
    input[type="text"],
    input[type="tel"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    input[type="text"]:focus,
    input[type="tel"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #FDC825;
    }
    input[type="submit"] {
        background-color: #34CC33;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
    
        font-weight:500;
        max-width: max-content;
        padding: 12px 28px;
    }
    input[type="submit"]:hover {
        background-color: #FDC825;
    }
    .image-preview {
        display: flex;
        flex-wrap: wrap;
    }
    .image-preview img {
        width: 100px;
        height: 100px;
        max-width: 200px;
        max-height: 200px;
        margin-right: 10px;
        margin-left: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    #photos1-container {
    background-color: #bbbaba; /* Blue color */
    padding: 10px;
    border-radius: 5px;
    margin-bottom: 0px;
    margin-left: 100px;
    }


</style>
</head>
<body>

<div class="container">
    <h2>Add a Post</h2>
    <form action="#" method="post" enctype="multipart/form-data">

        <table>
            <tr>
                <td><label for="photos">Images:</label></td>
                <td></td>
            </tr>
            <tr>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos1" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 1</span>
                        <div id="preview1" class="image-preview"></div>
                    </div>
                </td>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos2" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 2</span>
                        <div id="preview2" class="image-preview"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos3" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 3</span>
                        <div id="preview3" class="image-preview"></div>
                    </div>
                </td>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos4" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 4</span>
                        <div id="preview4" class="image-preview"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos5" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 5</span>
                        <div id="preview5" class="image-preview"></div>
                    </div>
                </td>
                <td style="background-color: #bbbaba;">
                    <br>
                    <div id="photos1-container" class="file-input-wrapper">
                        <input type="file" id="photos6" name="photos[]" accept="image/*" multiple>
                        <span class="file-input-label">Image 6</span>
                        <div id="preview6" class="image-preview"></div>
                    </div>
                </td>
            </tr>
        </table>


        <label for="location">Location:</label>
        <input type="text" id="location" name="location"><br>

        <label for="beds">Beds:</label>
        <input type="number" id="beds" name="beds"><br>

        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="f">Female</option>
            <option value="m">Male</option>
        </select><br>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone"><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4"></textarea><br>

        <input type="submit" value="Post Ad" class="btn btn-secondary">
    </form>

    <!-- Preview area for images -->
    <div id="image-preview"></div>
</div>

<script>
    // Change border color on input focus
    const inputs = document.querySelectorAll('input, select, textarea');
    inputs.forEach(input => {
        input.addEventListener('focus', () => {
            input.style.borderColor = '#FDC825';
        });
        input.addEventListener('blur', () => {
            input.style.borderColor = '#ccc';
        });
    });

    // Preview uploaded images and hide labels
    const fileInputs = document.querySelectorAll('input[type="file"]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const files = this.files;
            const previewId = this.id.replace('photos', 'preview');
            const preview = document.getElementById(previewId);
            const label = this.nextElementSibling; // Get the label element

            preview.innerHTML = ''; // Clear previous preview
            label.style.display = 'none'; // Hide the label

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(event) {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.maxWidth = '200px';
                    img.style.maxHeight = '200px';
                    img.style.marginRight = '10px';
                    img.style.marginBottom = '10px';
                    preview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    });
</script>



</body>
</html>
