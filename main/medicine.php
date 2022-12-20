<!DOCTYPE html> 
<html> 
    <head> 
          
        <!-- CSS property to place div
            side by side -->
        <style> 
            #leftbox {
                float:left; 
                background:Red;
             
            }

            #rightbox{
                float:right;
                
              
            }
  h5 { 
  text-align: center;
  color: white;
  text-transform: uppercase;
  padding: 0.1px;
  margin 0px;
  font-family: 'Raleway', cursive;
  font-weight: 500;
  position: relative;
  background: linear-gradient(to right, black, #eee, black);
}
h5::before {
  content: "";
  position: absolute;
  left: 50%;
  top: -50px;
  width: 600px;
  margin-left: -300px;
  margin-top: -220px;
  height: 600px;
  background: radial-gradient(50% 50%, ellipse closest-side, #444, black);
  z-index: -1;
}
h5 a {
  background: rgb(1, 100, 100);
  display: block;
  padding: 20px;
  text-decoration: none;
  letter-spacing: 30px;
  color: white;
}

article {
    --img-scale: 1.001;
    --title-color: black;
    --link-icon-translate: -20px;
    --link-icon-opacity: 0;
    position: relative;
    border-radius: 16px;
    box-shadow: none;
    background: #fff;
    transform-origin: center;
    transition: all 0.4s ease-in-out;
    overflow: hidden;
  }
  
  article a::after {
    position: absolute;
    inset-block: 0;
    inset-inline: 0;
    cursor: pointer;
    content: "";
  }
  
  /* basic article elements styling */
  article h2 {
    margin: 0 0 18px 0;
    font-family: "Bebas Neue", cursive;
    font-size: 1.9rem;
    letter-spacing: 0.06em;
    color: var(--title-color);
    transition: color 0.3s ease-out;
  }
  
  figure {
    margin: 0;
    padding: 0;
    aspect-ratio: 16 / 9;
    overflow: hidden;
  }
  
  article img {
    max-width: 100%;
    transform-origin: center;
    transform: scale(var(--img-scale));
    transition: transform 0.4s ease-in-out;
  }
  
  .article-body {
    padding: 24px;
  }
  
  article a {
    display: inline-flex;
    align-items: center;
    text-decoration: none;
    color: #28666e;
  }
  
  article a:focus {
    outline: 1px dotted #28666e;
  }
  
  article a .icon {
    min-width: 24px;
    width: 24px;
    height: 24px;
    margin-left: 5px;
    transform: translateX(var(--link-icon-translate));
    opacity: var(--link-icon-opacity);
    transition: all 0.3s;
  }
  
  /* using the has() relational pseudo selector to update our custom properties */
  article:has(:hover, :focus) {
    --img-scale: 1.1;
    --title-color: #28666e;
    --link-icon-translate: 0;
    --link-icon-opacity: 1;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
  }
  
  
  /************************ 
  Generic layout (demo looks)
  **************************/
  
  *,
  *::before,
  *::after {
    box-sizing: border-box;
  }
  
  body {
    margin: 0;
    padding: 24px 0;
    font-family: "Figtree", sans-serif;
    font-size: 1.2rem;
    line-height: 1.6rem;
    background-image: linear-gradient(45deg, #9a6db4, #9e5ec4);
    min-height: 100vh;
  }
  
  .articles {
    display: grid;
    max-width: 1200px;
    margin-inline: auto;
    padding-inline: 24px;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
  }
  
  @media screen and (max-width: 960px) {
    article {
      container: card/inline-size;
    }
    .article-body p {
      display: none;
    }
  }
  
  @container card (min-width: 380px) {
    .article-wrapper {
      display: grid;
      grid-template-columns: 100px 1fr;
      gap: 16px;
    }
    .article-body {
      padding-left: 0;
    }
    figure {
      width: 100%;
      height: 100%;
      overflow: hidden;
    }
    figure img {
      height: 100%;
      aspect-ratio: 1;
      object-fit: cover;
    }
  }
  
  .sr-only:not(:focus):not(:active) {
    clip: rect(0 0 0 0); 
    clip-path: inset(50%);
    height: 1px;
    overflow: hidden;
    position: absolute;
    white-space: nowrap; 
    width: 1px;
  }

        </style> 
    </head> 

    <body>  
    <div id = "boxes">


<div id = "leftbox">
<nav class="menu">
  <link rel="stylesheet" href="nav.css">
  <input id ="menu__toggle" type="checkbox" class='menu__toggle'/>
  <label for="menu__toggle" class="menu__toggle-label">
    <svg preserveAspectRatio='xMinYMin' viewBox='0 0 24 24'>
      <path d='M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z' />
    </svg>
    <svg preserveAspectRatio='xMinYMin' viewBox='0 0 24 24'>
      <path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
    </svg>
  </label>
  <ol class='menu__content'>
    <li class="menu-item"><a class="nav" href="http://localhost/patient/main/main.php">Home</a></li>
    <li class="menu-item"><a class = "nav"  href="http://localhost/patient/hospitals/hospitals_index.php">Hospitals</a></li>
    <li class="menu-item"><a class = "nav" href="http://localhost/patient/branches/branches_index.php">Branches</a></li>
    <li class="menu-item"><a class = "nav" href="http://localhost/patient/doctors/index_doctors.php">Doctors</a></li>
    <li class="menu-item"><a class = "nav" href="http://localhost/patient/nurses/index_nurses.php">Nurses</a></li>
 
    <li class="menu-item"><a class = "nav" href="http://localhost/patient/patients/index.php">Patients</a></li>
    <li class="menu-item">
      <a class = "nav" href="http://localhost/patient/main/medicine.php">Medicines</a>
      <ol class="sub-menu">
        <li class="menu-item"><a class = "nav"href="http://localhost/patient/medicines/index_medicine.php">Medicines</a></li>
        <li class="menu-item"><a class = "nav" href="http://localhost/patient/prescribed/index_prescribed.php">Prescription</a></li>
      </ol>
    </li>
    <li class="menu-item">
      <a  class = "nav"href="http://localhost/patient/main/working.php">Working Informations</a>
      <ol class="sub-menu">
        <li class="menu-item"><a class = "nav" href="http://localhost/patient/doctors_workin/index_doctors_worksin.php">Doctors'</a></li>
        <li class="menu-item"><a class = "nav" href="http://localhost/patient/nurses_workin/index_nurses_worksin.php">Nurses'</a></li>
      </ol>
    </li>
    <li class="menu-item"><a class = "nav" href="http://localhost/patient/insurance/index_insurance.php">Insurance</a></li>
    <li class="menu-item"><a  class = "nav"href="http://localhost/patient/treats/index_treats.php">Treatments</a></li>
  </ol>
</nav>


</div> 
<div id = "rightbox">
<section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="https://previews.123rf.com/images/alexraths/alexraths1310/alexraths131000001/23132287-heap-of-medicine-pills-background-made-from-colorful-pills-and-capsules.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Medicines</h2>
        <p>
            Inserting, deleting and filtering medicines.
        </p>
        <a href="http://localhost/patient/medicines/index_medicine.php" class="read-more">
          Go <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="https://apicms.thestar.com.my/uploads/images/2019/12/13/435593.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>Prescription</h2>
        <p>
            Inserting, deleting and filtering Prescription. 
        </p>
        <a href="http://localhost/patient/prescribed/index_prescribed.php" class="read-more">
          Go <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  

</section>
</div>

</div>
<body>  
