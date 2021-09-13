// -------------------------------------------------------------
// スムーススクロール
// -------------------------------------------------------------

export default function scrollTop(el, duration) {
  const target = document.getElementById(el)

  target.addEventListener("click", function (event) {
    event.preventDefault()
    let currentY = window.pageYOffset
    let step = duration / currentY > 1 ? 10 : 100
    let timeStep = (duration / currentY) * step
    let intervalId = setInterval(scrollUp, timeStep)

    function scrollUp() {
      currentY = window.pageYOffset
      if (currentY === 0) {
        clearInterval(intervalId)
      } else {
        scrollBy(0, -step)
      }
    }
  })
}
