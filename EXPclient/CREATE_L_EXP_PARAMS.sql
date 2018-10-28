CREATE GENERATOR GEN_L_EXP_PARAMS_ID;

CREATE TABLE L_EXP_PARAMS (
    ID         DM_ID /* DM_ID = BIGINT */,
    REC_ID     DM_ID /* DM_ID = BIGINT */,
    QUERY_ID   DM_ID /* DM_ID = BIGINT */,
    QUERY_VAL  DM_TEXT_BIG /* DM_TEXT_BIG = VARCHAR(10000) */
);




/******************************************************************************/
/***                                Triggers                                ***/
/******************************************************************************/


SET TERM ^ ;



/******************************************************************************/
/***                          Triggers for tables                           ***/
/******************************************************************************/



/* Trigger: L_EXP_PARAMS_BI */
CREATE OR ALTER TRIGGER L_EXP_PARAMS_BI FOR L_EXP_PARAMS
ACTIVE BEFORE INSERT POSITION 0
as
begin
  if (new.id is null) then
    new.id = gen_id(gen_l_exp_params_id,1);
end
^


SET TERM ; ^



/******************************************************************************/
/***                               Privileges                               ***/
/******************************************************************************/

