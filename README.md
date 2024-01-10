# FORMA MISSION 2
[Voir le wiki](https://github.com/kckmdev/formaSio/wiki)
[Voir la doc technique](./doc_technique.md)
[Voir la doc utilisateur](./doc_utilisateur.md)
## Côté client 
- [ ] 5. Revoir le jeu de tests
- [ ] 6. Revoir les salariés et bénévoles

## Côté admin
- [x] 1. Créer une formation, modifier une formation, supprimer une formation, dupliquer une formation
  - [x] 1.1 Créer une formation
  - [x] 1.2 Modifier une formation
  - [x] 1.3 Supprimer une formation
  - [x] 1.4 Afficher la liste des formations dans un tableau
  - [x] 1.5 Dupliquer une formation
- [x] 2. Gérer les profils et accès des utilisateurs (bénévoles/salariés) pour les inscriptions en ligne
- [x] 3. Valider manuellement les inscriptions faites en ligne (changer le statut de l'inscription de "en cours" à "validé")
- [x] 4. Imprimer une liste des inscrits à une formation (une semaine avant la formation) (au format PDF)
- [ ] 5. Historiser les participations en fin d'année (au format XML)
- [x] 6. Gérer les intervenants (ajouter, modifier, supprimer)
  - [x] 6.1 Ajouter un intervenant
  - [x] 6.2 Modifier un intervenant
  - [x] 6.3 Supprimer un intervenant
- [x] 7. Gérer les sessions
  - [x] 7.1 Créer une session
  - [x] 7.2 Modifier une session
  - [x] 7.3 Supprimer une session
  - [x] 7.4 Afficher la liste des sessions
  - [x] 7.5 Assigner des intervenants aux sessions
- [x] 8. Gérer les domaines
  - [x] 8.1 Ajouter un domaine
  - [x] 8.2 Modifier un domaine
  - [x] 8.3 Supprimer un domaine
  - [x] 8.4 Lier des formations à des domaines spécifiques

# Les routes

## Administrateur

- **Tableau de bord** : `GET /admin` (nommée `admin.dashboard`)
- **Formations** :
  - **Liste** : `GET /admin/formations` (nommée `admin.formations.index`)
  - **Création** : `GET /admin/formations/create` (nommée `admin.formations.create`)
  - **Enregistrement** : `POST /admin/formations` (nommée `admin.formations.store`)
  - **Détail** : `GET /admin/formations/{formation}` (nommée `admin.formations.show`)
  - **Édition** : `GET /admin/formations/{formation}/edit` (nommée `admin.formations.edit`)
  - **Mise à jour** : `PUT /admin/formations/{formation}` (nommée `admin.formations.update`)
  - **Suppression** : `DELETE /admin/formations/{formation}` (nommée `admin.formations.destroy`)
- **Intervenants** :
  - **Liste** : `GET /admin/intervenants` (nommée `admin.intervenants.index`)
  - **Création** : `GET /admin/intervenants/create` (nommée `admin.intervenants.create`)
  - **Enregistrement** : `POST /admin/intervenants` (nommée `admin.intervenants.store`)
  - **Détail** : `GET /admin/intervenants/{intervenant}` (nommée `admin.intervenants.show`)
  - **Édition** : `GET /admin/intervenants/{intervenant}/edit` (nommée `admin.intervenants.edit`)
  - **Mise à jour** : `PUT /admin/intervenants/{intervenant}` (nommée `admin.intervenants.update`)
  - **Suppression** : `DELETE /admin/intervenants/{intervenant}` (nommée `admin.intervenants.destroy`)
- **Domaines** :
  - **Liste** : `GET /admin/domaines` (nommée `admin.domaines.index`)
  - **Création** : `GET /admin/domaines/create` (nommée `admin.domaines.create`)
  - **Enregistrement** : `POST /admin/domaines` (nommée `admin.domaines.store`)
  - **Détail** : `GET /admin/domaines/{domaine}` (nommée `admin.domaines.show`)
  - **Édition** : `GET /admin/domaines/{domaine}/edit` (nommée `admin.domaines.edit`)
  - **Mise à jour** : `PUT /admin/domaines/{domaine}` (nommée `admin.domaines.update`)
  - **Suppression** : `DELETE /admin/domaines/{domaine}` (nommée `admin.domaines.destroy`)
- **Sessions** :
  - **Liste** : `GET /admin/sessions` (nommée `admin.sessions.index`)
  - **Création** : `GET /admin/sessions/create` (nommée `admin.sessions.create`)
  - **Enregistrement** : `POST /admin/sessions` (nommée `admin.sessions.store`)
  - **Détail** : `GET /admin/sessions/{session}` (nommée `admin.sessions.show`)
  - **Édition** : `GET /admin/sessions/{session}/edit` (nommée `admin.sessions.edit`)
  - **Mise à jour** : `PUT /admin/sessions/{session}` (nommée `admin.sessions.update`)
  - **Suppression** : `DELETE /admin/sessions/{session}` (nommée `admin.sessions.destroy`)

## Utilisateur

- **Tableau de bord** : `GET /user` (nommée `user.dashboard`)

## Utilisateurs authentifiés

- **Déconnexion** : `POST /logout` (nommée `user.logout`)
- **Profil** : `GET /profile` (nommée `user.profile`)

## Utilisateurs invités

- **Accueil** : `GET /` (nommée `home`)
- **Connexion** : `GET /login`
- **Authentification** : `POST /login` (nommée `login`)
- **Contact** : `GET /contact`
  