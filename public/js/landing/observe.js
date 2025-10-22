const header = document.querySelector('header')
const sectionToObserve = document.querySelector('.observable')

const observableOptions = {
  rootMargin: '-64px 0px 0px 0px'
}

const sectionObserver = new IntersectionObserver((entries, sectionObserver) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      header.classList.add('dark')
    } else {
      header.classList.remove('dark')
    }
  })
}, observableOptions)

sectionObserver.observe(sectionToObserve)
