# Accesses

Badge fisici, assegnazioni nel tempo, varchi e log degli accessi.

Il pacchetto non conosce chi porta il badge: l'assegnazione e' polimorfica.
Qualsiasi modello che implementi `BadgeHolderInterface` e usi `IsBadgeHolderTrait`
puo' portare un badge (operatori, visitatori, ditte esterne, mezzi).

## Modelli

- `Badge` — la tessera fisica, identificata dal suo `code`. Non sa a chi appartiene.
- `BadgeAssignment` — il legame badge/titolare con validita' `valid_from` / `valid_to`.
  Una tessera riassegnata genera una nuova riga: lo storico non viene mai riscritto.
- `AccessGate` — il varco.
- `AccessLog` — la strisciata. Conserva `badge_code` grezzo, cosi' viene registrata
  anche quando il badge non esiste a sistema. Il titolare non viene mai copiato qui:
  si risolve passando dall'assegnazione valida al momento dell'accesso.

## Agganciare un titolare

```php
class Operator extends BaseModel implements BadgeHolderInterface
{
	use IsBadgeHolderTrait;
}
```
