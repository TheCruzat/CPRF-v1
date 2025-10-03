// document loaded aka The JumpOff

document.addEventListener("DOMContentLoaded", (event) => {

// gather up the things we will need

  const body = document.querySelector('body'),
        mobileBtn = document.querySelector('#mobile-menu'),
        lb = document.querySelector('#lb');

  let currAvatar,
      LBRoot;


// mobile controls, good good

  function toggleMobile() {
    if(body.classList.contains('mobile-open')) {
      body.classList.remove('mobile-open');
      mobileBtn.setAttribute('aria-expanded', false);
      mobileBtn.setAttribute('aria-label', 'Open Main Menu');
    } else {
      body.classList.add('mobile-open');
      mobileBtn.setAttribute('aria-expanded', true);
      mobileBtn.setAttribute('aria-label', 'Close Main Menu');
    }
  }
  mobileBtn.addEventListener('click', toggleMobile);


// fetch post data and push to callback

  async function getPost(id, type, callBack) {
    const url = siteURL + '/wp-json/wp/v2/' + type + '/' + id;
    console.log(url);
    try {
      const response = await fetch(url);
      if (!response.ok) {
        throw new Error(`Response status: ${response.status}`);
      }
      LBRoot = await response.json();
      callBack();
    } catch (error) {
      console.error(error.message);
    }
  }


// draw lightbox

  function drawBox() {

    // draw from keeper in main scope
    i = LBRoot;

    // name value
    const name = i.title.rendered;

    // role value, layout is dynamic for null
    let role = ''; if(i.acf.role !== null && i.acf.role !== undefined) role = '<p>' + i.acf.role + '</p>';

    // get image file
    const img = currAvatar;

    // content value
    const content = i.content.rendered;

    // create lightbox body with variables in play
    const LBBody = `
      <div class="fixed overflow-scroll z-100 top-[0] bottom-[0] left-[0] right-[0] w-full h-full bg-[rgba(52,67,72,0.8)] backdrop-blur-[10px]">
        <div class="relative ec-block md:px-16 lg:px-24 xl:px-32 md:py-[var(--blockSpace)]">
          <div class="md:max-w-[48rem] md:mx-auto">
            <div class="lb-floater relative bg-white p-[2rem]">

              <div class="md:grid md:grid-cols-[180px_auto] md:gap-[2rem] md:items-center mb-[2rem]">
                <div class="max-md:mb-[1rem]">
                  <img src="`+img+`">
                </div>
                <div>
                  <h2>`+name+`</h2>
                  `+role+`
                </div>
              </div>

              `+content+`

              <div class="w-full text-center">
                <button class="lb-close cursor-pointer">CLOSE</button>
              </div>

              <button class="lb-close absolute top-[4px] right-[4px] w-[4rem] h-[4rem] min-w-[0] cursor-pointer p-[0]! bg-white! border-none!">
                <span class="block absolute h-[4px] w-[1.5rem] bg-[var(--darkOlive)] rotate-45 top-[calc(50%-2px)] left-[calc(50%-0.75rem)]"></span>
                <span class="block absolute h-[4px] w-[1.5rem] bg-[var(--darkOlive)] -rotate-45 top-[calc(50%-2px)] left-[calc(50%-0.75rem)]"></span>
              </button>

            </div>

          </div>
        </div>
      </div>
    `;

    // disable body scroll
    body.classList.add('overflow-hidden');

    // set lightbox content
    lb.innerHTML = LBBody;

    // set close lightbox functionalities
    document.querySelectorAll('.lb-close').forEach((btn, ndx) => btn.addEventListener('click', () => closeBox() ) );
    document.addEventListener('keydown', function(event) { if (event.key === "Escape" || event.keyCode === 27) closeBox(); });
    lb.addEventListener('click', () => closeBox() );
    lb.querySelector('.lb-floater').addEventListener('click', function(e) { e.stopPropagation(); });
  }


// empty lightbox and remove listeners

  function closeBox() {
    body.classList.remove('overflow-hidden');
    document.querySelectorAll('.lb-close').forEach((btn, ndx) => btn.removeEventListener('click', () => {} ) );
    document.removeEventListener('keydown', () => {});
    lb.removeEventListener('click', () => {} );
    lb.querySelector('.lb-floater').removeEventListener('click', function() { });
    lb.innerHTML = '';
  }


// lightbox trigger items

  document.querySelectorAll('[data-lb-id]').forEach((lnk, ndx) => {
    const
      id = lnk.getAttribute('data-lb-id'),
      type = lnk.getAttribute('data-lb-type');

    lnk.addEventListener('click', function() {
      currAvatar = this.querySelector('img').getAttribute('src');
      getPost(id, type, drawBox);
    });
  });


// automatically add target _blank to off site links in header / footer

  document.querySelectorAll('header a, footer a').forEach((link, ndx) => {
    if(!link.getAttribute('href').includes(siteURL) && !link.getAttribute('target')) link.setAttribute('target', '_blank');
  });


//

});
