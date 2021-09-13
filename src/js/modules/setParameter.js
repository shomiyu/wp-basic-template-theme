// -------------------------------------------------------------
// 計測パラメーターの設定
// - sessionStrage でユニークユーザIDを管理
// -------------------------------------------------------------

export default function setParameter() {
  const userId = sessionStorage.getItem("userId")

  if (userId === null) {
    // 10桁のランダムな数値を設定
    const userNum = Math.floor(Math.random() * 9000000000) + 1000000000

    sessionStorage.setItem("userId", userNum)
  }
}
