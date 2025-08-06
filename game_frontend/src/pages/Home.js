import React, { useEffect, useState } from "react";
import { getGames } from "../api/api"; 
import GameCard from "../components/GameCard";

export default function Home() {
  const [games, setGames] = useState([]);
  const [sortOrder, setSortOrder] = useState("desc");

  useEffect(() => {
    getGames().then(setGames);
  }, []);

//  useEffect(() => {
//   fetch("http://localhost/game_api/core_test.php")
//     .then(r => r.json())
//     .then(d => console.log(d))
//     .catch(e => console.error(e));
// }, []);

  const sortedGames = [...games].sort((a, b) =>
    sortOrder === "desc" ? b.rating - a.rating : a.rating - b.rating
  );

  return (
    <div>
      <h1>Game Catalog</h1>
      <div>
        <label>Sort by rating: </label>
        <select value={sortOrder} onChange={(e) => setSortOrder(e.target.value)}>
          <option value="desc">High to Low</option>
          <option value="asc">Low to High</option>
        </select>
      </div>
      <div className="games-grid">
        {sortedGames.map((g) => (
          <GameCard key={g.id} game={g} />
        ))}
      </div>
    </div>
  );
}
