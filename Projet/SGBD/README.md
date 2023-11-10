Les Regles de gestion de la conception de données. 
Recommandation <-> Utilisateur:
1:N - Chaque recommandation est specifique à un seul utilisateur, mais un utilisateur peut avoir plusieurs recommandations(par exemple des recommandation alimentaires quotidiennes)
Utilisateur<->Consommation aliments:
1:N - Un utilisateur peut avoir plusieurs enregistrements de consommation (Historique de ce qu'il a mangé), mais chaque enregistrement de consommation appartient à un seul utilisateur.
Utilisateur<-> aliments:
1:N - L'utilisateur peut avoir plusieurs liste d'aliments à consommer durant la journée, mais une liste d'aliments est faite pour un seul utilisateur. 