(function () {
  const MESSAGES = [];

  MESSAGES.push({
    delay: 0,
    text: `Salut à tou·te·s, Bienvenue sur PtiCuisto, l'endroit idéal pour les amoureux·ses de la cuisine en quête d'inspiration. Ici, pas de formalités ni de recettes complexes, juste de la cuisine accessible à tou·te·s, quel que soit votre âge.

    Sur PtiCuisto, nous sommes tou·te·s là pour apprendre et partager sans crainte de la critique. C'est un espace où l'expérimentation est encouragée, les erreurs sont des opportunités d'apprentissage, et les succès sont à célébrer ensemble.
    Alors, prenez votre tablier, lancez-vous en cuisine, et rejoignez la communauté PtiCuisto pour un voyage culinaire rempli de découvertes, de plaisirs gustatifs et de partage. Nous avons hâte de voir vos créations et d'entendre vos idées, car PtiCuisto, c'est avant tout une grande famille de passionné·e·s de cuisine, curieux·ses et anonymes.
    Bonne cuisine et à bientôt sur PtiCuisto !
    L'équipe de PtiCuisto`
  });

  const container = document.getElementById("container");
  const message = document.getElementById("message");
  const animateBtn = document.getElementById("animate");
  let paragraph = null;

  function scramble(element, text, options) {
    const defaults = {
      probability: 0.2,
      glitches: '-|/\\',
      blank: '',
      duration: text.length * 20,
      delay: 0.0
    };

    const settings = Object.assign(defaults, options);

    const shuffle = () => Math.random() < 0.5 ? 1 : -1;

    const wrap = (text, classes) => `<span class="${classes}">${text}</span>`;

    const ghostText = element.innerText;
    const ghostCharacters = ghostText.split('');
    const ghostLength = ghostCharacters.length;
    const ghosts = ghostCharacters.map(letter => wrap(letter, 'ghost'));

    const textCharacters = text.split('');
    const textLength = textCharacters.length;

    const order = Array.from({ length: textLength }, (_, i) => i).sort(shuffle);
    const output = [];

    const object = { value: 0 };
    const target = { value: 1 };

    const parameters = {
      duration: settings.duration,
      delay: settings.delay,
      complete: function () {
        element.innerHTML = text;
      }
    };

    return setTimeout(() => {
      animateValue(object, target, parameters, (value) => {
        const progress = Math.floor(value * (textLength - 1));
        for (let i = 0; i <= progress; i++) {
          const index = order[i];
          output[index] = textCharacters[index];
        }
        element.innerHTML = output.join('');
      });
    }, settings.delay);
  }

  function animateValue(object, target, parameters, callback) {
    const startTime = performance.now();

    function update() {
      const currentTime = performance.now();
      const elapsedTime = currentTime - startTime;
      const progress = Math.min(1, elapsedTime / parameters.duration);

      object.value = progress;

      callback(progress);

      if (progress < 1) {
        requestAnimationFrame(update);
      } else {
        parameters.complete();
      }
    }

    requestAnimationFrame(update);
  }

  function animate() {
    MESSAGES.forEach((data, index) => {
      const element = paragraph[index];
      element.innerText = '';
      const options = {
        delay: data.delay
      };
      scramble(element, data.text, options);
    });
  }

  function initialise() {
    animateBtn.addEventListener('click', animate);
    MESSAGES.forEach(() => {
      message.innerHTML += `<p style="justify-content: center;text-justify: auto;text-align: justify;"></p>`;
    });
    paragraph = container.querySelectorAll("p");
    animate();
  }

  initialise();

})();

document.addEventListener("DOMContentLoaded", function () {
    var presentationIndex = document.querySelector(".Presentionindex");
    var content = document.querySelector(".Content");
    setTimeout(function () {
      presentationIndex.classList.add("translateYAnimation");
      content.classList.remove("hidden");
      content.classList.add("ContenttranslateYAnimation2");
    }, 300);
    setTimeout(function () {
      presentationIndex.style.display = "none";
    }, 800);
});