<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store Website</title>
    <link rel="stylesheet" href="style pqge.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
.row h1 {
    font-size: 24px;
            color: #2e7d32;
}
</style>
<body>
    
    <section>

        <nav>
        <div class="row">
            <h1>Bibliothèque Centrale</h1>
            </div>



            <ul>
                <li><a href="P_accueil.php"></a></li>
                <li><a href="P_accueil.php">Accueil</a></li>
                <li><a href="#Featured">À la une</a></li>
                <li><a href="#Arrivals">Nos coups de coeur</a></li>
                <li><a href="#Reviews">Reviews</a></li>
                <li><a href="#Blog">Commentaires</a></li>
            </ul>

            <div class="social_icon">
            
                <i class="fa-solid fa-magnifying-glass"></i>
                <i class="fa-solid fa-heart"></i>
                <a href="connexion.php" class="btn-login">Connexion</a>
            </div>

        </nav>
        <section class="slideshow-container" style="background-image: url('bibliothèque.jpg'); background-size: cover; background-position: center; padding: 20px;">
  <!-- Première image -->
  <div class="mySlides fade">
    <div class="image-container">
      <img src="image/R.jpg" alt="Image 1">
      <div class="overlay">
        <div class="text">
          <h1>NAUTHY skin care</h1>
          <p>Plongez dans l'univers de la beauté et de l'élégance. Découvrez le secret d'une peau éclatante et d'un teint resplendissant.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Deuxième image -->
  <div class="mySlides fade">
    <div class="image-container">
      <img src="image/vraie0.jpg" alt="Image 2">
      <div class="overlay">
        <div class="text">Description de l'image 2</div>
      </div>
    </div>
  </div>

  <!-- Troisième image -->
  <div class="mySlides fade">
    <div class="image-container">
      <img src="image/TO1.jpg" alt="Image 3">
      <div class="overlay">
        <div class="text">Explorez le monde de la beauté avec notre collection exclusive de produits. Découvrez la quintessence du luxe et de l'élégance pour sublimer votre quotidien.</div>
      </div>
    </div>
  </div>
</section>

<!-- Script JavaScript pour le défilement automatique -->
<script>
  var slideIndex = 0;
  showSlides();

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 3000); // Change image every 3 seconds
  }
</script>


    

    

    


    <!--Books-->

    <div class="featured_boks">
   <!-- Inclure une police depuis Google Fonts (par exemple Roboto) -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

<div style="display: flex; align-items: flex-start; justify-content: center; margin-top: 60px;">
  <!-- Trait vertical -->
  <div style="width: 8px; background-color: #a12345; height: 100px; margin-right: 15px;"></div>
  
  <!-- Texte avec nouvelle police -->
  <div style="font-family: 'Roboto', sans-serif;">
    <h2 style="margin: 0; font-size: 1.5em; font-weight: bold; color: #333;">LES ACTUALITÉS</h2>
    <p style="margin: 0; font-size: 3em; font-weight: bold; color: #333;">À LA UNE</p>
  </div>
</div>



        <div class="featured_book_box">

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover.jpg" alt="Couverture du livre">

                </div>

                <div class="featurde_book_tag">
    <h2>La Forêt des Ombres</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, horreur, romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
</div>
            

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                     <img src="Book_cover1.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Anorexie, Psychiatrie, Combat</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
</div>

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover2.jpg" alt="Couverture du livre">

                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
   
</div>

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover3.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
             

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover4.webp" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
               

            </div>
            
            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover5.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
              

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover6.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
             

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover7.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover8.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
               

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover9.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
             

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover10.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
           

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover11.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
               

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover12.jpg" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>

            </div>

            <div class="featured_book_card">

                <div class="featurde_book_img">
                <img src="Book_cover13.webp" alt="Couverture du livre">
                </div>

                <div class="featurde_book_tag">
    <h2>Featured Books</h2>
    <p class="writer">John Deo</p>
    <div class="categories" style="margin-bottom: 20px;">Thriller, Horror, Romance</div> <!-- Ajout de margin-bottom -->
    <a href="#" class="f_btn">Learn More</a>
    
</div>
            

            </div>

            </div>
  

        </div>

    </div>



    
    <!--Arrivals-->

    <div class="arrivals">
    <div style="display: flex; align-items: flex-start; justify-content: center; margin-top: 60px;">
  <!-- Trait vertical avec espace à gauche -->
  <div style="width: 8px; background-color: #089da1; height: 80px; margin-right: 15px; margin-left: 40px;"></div>
  
  <!-- Texte -->
  <div style="font-family: 'Roboto', sans-serif;">
    <h2 style="margin: 0; font-size: 1.5em; font-weight: bold; color: #333;">NOS COUPS</h2>
    <p style="margin: 0; font-size: 3em; font-weight: bold; color: #333; margin-bottom: 20px;">DE COEUR</p>
  </div>
</div>

        <div class="arrivals_box">

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture1.jpg">
                    
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="couverture.jpg">
                   
                </div>
                <div class="arrivals_tag">
                <div class="heart-icon">
                  <i class="fa-regular fa-heart"></i>
              </div>
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="couverture2.webp">
                    
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                    <img src="couverture3.jpg">
                   
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture4.webp">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture5.webp">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture6.jpg">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture7.jpg">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture8.webp">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

            <div class="arrivals_card">
                <div class="arrivals_image">
                <img src="couverture9.jpg">
                </div>
                <div class="arrivals_tag">
                    <p>New Arrivals</p>
                    <div class="arrivals_icon">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <a href="#" class="arrivals_btn">Learn More</a>
                </div>
            </div>

        </div>

    </div>

    <!--Blog-->
    
    <div class="blog">
    <div style="display: flex; align-items: flex-start; justify-content: center; margin-top: 90px;">
  <!-- Trait vertical -->
  <div style="width: 8px; background-color: #a12345; height: 100px; margin-right: 15px; margin-left: 40px;"></div>
  
  <!-- Texte -->
  <div style="font-family: 'Roboto', sans-serif;">
    <h2 style="margin: 0; font-size: 1.5em; font-weight: bold; color: #333; margin-bottom: 10px;">NOS DERNIERS</h2>
    <p style="margin: 0; font-size: 3em; font-weight: bold; color: #333; margin-bottom: 30px;">COMMENTAIRES</p>
  </div>
</div>








        <div class="blog_box">

            <div class="blog_card">
                <div class="blog_img">
                    <img src="young1.jpeg">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>
                    Bonjour, je m'appelle JP. Passionné par l'écriture, je partage ici mes pensées, 
                    expériences et conseils sur divers sujets, allant de la technologie à la culture. 
                    Rejoignez-moi dans cette aventure intellectuelle !

                    </p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>

            <div class="blog_card">
                <div class="blog_img">
                    <img src="young2.png">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>
                    Je m'appelle Joe. Curieux de tout, j'écris sur des sujets qui m'inspirent : 
                    technologie, culture, et développement personnel. Mon objectif est d'apprendre, 
                    de partager et de grandir avec vous. Découvrez mes histoires !
                    </p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>

            <div class="blog_card">
                <div class="blog_img">
                    <img src="young3.webp">
                </div>
                <div class="blog_tag">
                    <h2>Bloger</h2>
                    <p>
                    Je suis Julie, un créateur d'histoires et de contenu. Chaque article est une nouvelle aventure où je
                     mélange faits, réflexions et un soupçon de créativité 
                     pour captiver votre imagination
                    </p>
                    <div class="blog_icon">
                        <i class="fa-solid fa-calendar-days"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                </div>
            </div>

        </div>
    </div>





    <!--Footer-->

    <footer>
        <div class="footer_main">

        

            <div class="tag">
                <h1>Quick Link</h1>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Featured</a>
                <a href="#">Arrivals</a>
                <a href="#">Reviews</a>
                <a href="#">Commentaires</a>
                
            </div>

            <div class="tag">
                <h1>Contact Info</h1>
                <a href="#"><i class="fa-solid fa-phone"></i>+33 7 75 54 22 30</a>
                <a href="#"><i class="fa-solid fa-phone"></i>+33 7 78 85 33 16</a>
                <a href="#"><i class="fa-solid fa-envelope"></i>bibliothèquecentrale@gmail.com</a>
                
            </div>

            <div class="tag">
                <h1>Follow Us</h1>
                <div class="social_link">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-linkedin-in"></i>
                </div>
                
            </div>

            <div class="tag">
                <h1>Newsletter</h1>
                <div class="search_bar">
                    <input type="text" placeholder="You email id here">
                    <button type="submit">Subscribe</button>
                </div>                
            </div>            
            
        </div>

        <p  class="end" >Bibliothequecentrale<span></p>

    </footer>





    
</body>
</html>
